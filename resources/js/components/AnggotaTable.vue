<template>
    <div>
        <div class="flex justify-between items-center mb-4">
            <input 
                v-model="search" 
                @input="fetchAnggota" 
                type="text" 
                placeholder="Cari anggota..." 
                class="border rounded p-2"
            />
            <button @click="openModal('add')" class="bg-blue-500 text-white px-4 py-2 rounded">
                Tambah Anggota
            </button>
        </div>
        <table class="min-w-full border-collapse text-white border border-gray-200">
            <thead>
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Nama</th>
                    <th class="border p-2">Pengguna ID</th>
                    <th class="border p-2">Perumahan id</th>
                    <th class="border p-2">Perumahan No</th>
                    <th class="border p-2">Alamat</th>
                    <th class="border p-2">HP</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in anggota" :key="item.Anggota_id">
                    <td class="border p-2">{{ item.Anggota_id }}</td>
                    <td class="border p-2">{{ item.Anggota_nama }}</td>
                    <td class="border p-2">{{ item.Anggota_pengguna_id }}</td>
                    <td class="border p-2">{{ item.Anggota_perumahan_id }}</td>
                    <td class="border p-2">{{ item.Anggota_perumahan_no }}</td>
                    <td class="border p-2">{{ item.Anggota_alamat }}</td>
                    <td class="border p-2">{{ item.Anggota_hp }}</td>
                    <td class="border p-2">
                        <button @click="editAnggota(item)" class="bg-yellow-500 text-white px-2 py-1 rounded">Edit</button>
                        <button @click="deleteAnggota(item.Anggota_idid)" class="bg-red-500 text-white px-2 py-1 rounded">Hapus</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <button @click="prevPage" :disabled="!anggota.prev_page_url" class="p-2 bg-gray-300">Prev</button>
            <button @click="nextPage" :disabled="!anggota.next_page_url" class="p-2 bg-gray-300">Next</button>
        </div>
    </div>
</template>

<script>

import axios from 'axios';
import debounce from 'lodash.debounce';


export default {
    name: "AnggotaComponent",
    data() {
        return {
            anggota: [],
            search: '',
        };
    },
    methods: {
        fetchAnggota() {
            axios.get(`/api/anggota?search=${this.search}`).then(response => {
                this.anggota = response.data;
            });
        },
        editAnggota(item) {
            // Buka modal untuk edit
        },
        deleteAnggota(id) {
            if (confirm('Yakin ingin menghapus?')) {
                axios.delete(`/api/anggota/${id}`).then(() => {
                    this.fetchAnggota();
                });
            }
        },
        openModal(type) {
            // Handle modal untuk tambah/edit
        },
    },
    mounted() {
        this.fetchAnggota();
    },
};
</script>
