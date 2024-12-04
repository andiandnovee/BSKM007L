<template>
    <div class="p-4 space-y-4">
        <!-- Search and Add Button -->
        <div class="flex justify-between items-center">
            <div class="relative">
                <input v-model="search" @input="fetchAnggota" type="text" placeholder="Cari anggota..."
                    class="pl-input w-full max-w-xs" />
            </div>
            <button @click="openModal('add')" class="pl-btn pl-btn-primary">
                Tambah Anggota
            </button>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
            <table class="pl-table pl-table-hover w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="text-left py-2 px-4">ID</th>
                        <th class="text-left py-2 px-4">Nama</th>
                        <th class="text-left py-2 px-4">Pengguna ID</th>
                        <th class="text-left py-2 px-4">Perumahan ID</th>
                        <th class="text-left py-2 px-4">Perumahan No</th>
                        <th class="text-left py-2 px-4">Alamat</th>
                        <th class="text-left py-2 px-4">HP</th>
                        <th class="text-left py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in anggota.data" :key="item.Anggota_id" class="hover:bg-gray-50">
                        <td class="py-2 px-4">{{ item.Anggota_id }}</td>
                        <td class="py-2 px-4">{{ item.Anggota_nama }}</td>
                        <td class="py-2 px-4">{{ item.Anggota_pengguna_id }}</td>
                        <td class="py-2 px-4">{{ item.perumahan.Perumahan_nama }}</td>
                        <td class="py-2 px-4">{{ item.Anggota_perumahan_no }}</td>
                        <td class="py-2 px-4">{{ item.Anggota_alamat }}</td>
                        <td class="py-2 px-4">{{ item.Anggota_hp }}</td>
                        <td class="py-2 px-4 space-x-2">
                            <button @click="openModal('edit', item)" class="pl-btn pl-btn-warning">
                                Edit
                            </button>
                            <button @click="deleteAnggota(item.Anggota_id)" class="pl-btn pl-btn-danger">
                                Hapus
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="flex justify-between items-center">
            <button @click="prevPage" :disabled="!anggota.prev_page_url" class="pl-btn pl-btn-secondary">
                Prev
            </button>
            <button @click="nextPage" :disabled="!anggota.next_page_url" class="pl-btn pl-btn-secondary">
                Next
            </button>
        </div>

        <!-- Modal for Add/Edit -->
        <div v-if="showModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50">
            <div class="bg-white rounded-lg p-6 space-y-4 w-full max-w-md">
                <h2 class="text-lg font-semibold">
                    {{ modalType === 'add' ? 'Tambah Anggota' : 'Edit Anggota' }}
                </h2>
                <form @submit.prevent="saveAnggota">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium">Nama</label>
                            <input v-model="formData.Anggota_nama" type="text"
                                class="pl-input w-full form-input border rounded" placeholder="Masukkan nama"
                                required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Alamat</label>
                            <input v-model="formData.Anggota_alamat" type="text" class="pl-input w-full"
                                placeholder="Masukkan alamat" required />
                        </div>
                        <div>
                            <label class="block text-sm font-medium">Nomor HP</label>
                            <input v-model="formData.Anggota_hp" type="text" class="pl-input w-full"
                                placeholder="Masukkan nomor HP" required />
                        </div>
                    </div>
                    <div class="flex justify-end space-x-4 mt-4">
                        <button type="button" class="pl-btn pl-btn-secondary" @click="closeModal">
                            Batal
                        </button>
                        <button type="submit" class="pl-btn pl-btn-primary">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
import { ref, reactive, onMounted } from 'vue';
import axios from 'axios';
import debounce from 'lodash.debounce';

export default {
    name: 'AnggotaComponent',
    setup() {
        const anggota = reactive({
            data: [],
            prev_page_url: null,
            next_page_url: null,
        });

        const search = ref('');
        const currentPage = ref(1);
        const showModal = ref(false);
        const modalType = ref('add');
        const formData = reactive({
            Anggota_id: null,
            Anggota_nama: '',
            Anggota_alamat: '',
            Anggota_hp: '',
        });

        const fetchAnggota = debounce((page = 1) => {
            const searchQuery = search.value ? `&search=${search.value}` : '';
            axios.get(`/api/anggota?page=${page}${searchQuery}`).then((response) => {
                Object.assign(anggota, response.data);
            });
        }, 300);

        const openModal = (type, item = null) => {
            modalType.value = type;
            if (type === 'edit' && item) {
                Object.assign(formData, item);
            } else {
                resetFormData();
            }
            showModal.value = true;
        };

        const closeModal = () => {
            showModal.value = false;
        };

        const resetFormData = () => {
            formData.Anggota_id = null;
            formData.Anggota_nama = '';
            formData.Anggota_alamat = '';
            formData.Anggota_hp = '';
        };

        const saveAnggota = () => {
            if (modalType.value === 'add') {
                axios.post('/api/anggota', formData).then(() => {
                    fetchAnggota(currentPage.value);
                    closeModal();
                });
            } else if (modalType.value === 'edit') {
                axios.put(`/api/anggota/${formData.Anggota_id}`, formData).then(() => {
                    fetchAnggota(currentPage.value);
                    closeModal();
                });
            }
        };

        const deleteAnggota = (id) => {
            if (confirm(`Yakin ingin menghapus ID ${id}?`)) {
                axios.delete(`/api/anggota/${id}`).then(() => {
                    fetchAnggota(currentPage.value);
                });
            }
        };

        const nextPage = () => {
            if (anggota.next_page_url) {
                currentPage.value++;
                fetchAnggota(currentPage.value);
            }
        };

        const prevPage = () => {
            if (anggota.prev_page_url) {
                currentPage.value--;
                fetchAnggota(currentPage.value);
            }
        };

        onMounted(() => {
            fetchAnggota();
        });

        return {
            anggota,
            search,
            currentPage,
            showModal,
            modalType,
            formData,
            fetchAnggota,
            openModal,
            closeModal,
            resetFormData,
            saveAnggota,
            deleteAnggota,
            nextPage,
            prevPage,
        };
    },
};
</script>
