<template>
    <div>
        <!-- Input Pencarian -->
        <input type="text" v-model="query" @keyup="debouncedSearch" :placeholder="placeholder"
            class="form-input border rounded px-3 py-2" />

        <!-- Loading Indikator -->
        <div v-if="loading" class="mt-2">Sedang mencari...</div>

        <!-- Tabel Hasil Pencarian -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="border rounded-lg overflow-hidden dark:border-neutral-700">
                        <table v-if="results && results.length"
                            class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700 w-full mt-4">
                            <thead class="bg-gray-50 dark:bg-neutral-700">
                                <tr>
                                    <th v-for="(field, index) in fieldsArray" :key="index" scope="col"
                                        class="px-6 py-3 text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                                        {{ field }}
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <tr v-for="result in results" :key="result.id" class="hover:bg-gray-100 dark:hover:bg-neutral-700">
                                    <td v-for="field in fieldsArray" :key="field"
                                        class=" px-6 py-4 whitespace-nowrap text-sm font-medium text-white-800 dark:text-neutral-200">
                                        {{ result[field] !== null && result[field] !== undefined ? result[field] : '-'
                                        }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pesan Jika Tidak Ada Data -->
        <div v-if="!loading && !results.length && query.length >= 3" class="mt-2">Tidak ada data yang cocok.</div>

        <!-- Informasi Pagination -->
        <div v-if="results.length" class="mt-4">
            <div class="mb-2">
                Menampilkan {{ results.length }} dari {{ totalItems }} data.
            </div>
            <div>
                <button @click="changePage(page - 1)" :disabled="page <= 1" class="px-3 py-1 mx-1 border rounded">
                    Previous
                </button>

                <!-- Nomor Halaman -->
                <button v-for="pageNumber in pageNumbers" :key="pageNumber" @click="changePage(pageNumber)"
                    :class="{ 'font-bold bg-gray-200': pageNumber === page }" class="px-3 py-1 mx-1 border rounded">
                    {{ pageNumber }}
                </button>

                <button @click="changePage(page + 1)" :disabled="page >= totalPages"
                    class="px-3 py-1 mx-1 border rounded">
                    Next
                </button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
import debounce from 'lodash.debounce';

export default {
    name: "SearchComponent",
    props: {
        table: {
            type: String,
            required: true,
        },
        fields: {
            type: String,
            required: true,
        },
        placeholder: {
            type: String,
            default: "Cari...",
        },
    },
    data() {
        return {
            query: '',
            results: [], // Inisialisasi sebagai array
            loading: false,
            page: 1,
            totalPages: 1,
            totalItems: 0,
            fieldsArray: this.fields ? this.fields.split(',') : [], // Pastikan terdefinisi
        };
    },

    methods: {
        search(page = 1) {
            if (this.query.length < 3) {
                this.results = [];
                this.totalPages = 1;
                this.totalItems = 0;
                return;
            }

            this.loading = true;

            axios
                .get("/search", {
                    params: {
                        table: this.table,
                        fields: this.fields,
                        search: this.query,
                        page: page,
                    },
                })
                .then((response) => {
                    this.results = response.data.data;
                    this.totalItems = response.data.total;
                    this.page = response.data.current_page;
                    this.totalPages = response.data.last_page;
                    this.loading = false;
                })
                .catch(() => {
                    this.loading = false;
                });
        },
        changePage(page) {
            if (page > 0 && page <= this.totalPages) {
                this.search(page);
            }
        },
    },
    computed: {
        pageNumbers() {
            const range = 2; // Jumlah halaman sebelum dan sesudah halaman aktif
            const start = Math.max(1, this.page - range);
            const end = Math.min(this.totalPages, this.page + range);
            return Array.from({ length: end - start + 1 }, (_, i) => start + i);
        },
    },
    created() {
        this.debouncedSearch = debounce(() => {
            this.search(1);
        }, 300); // Penundaan pencarian 300ms
    },
};
</script>

<style scoped>
.font-bold {
    font-weight: bold;
}

.bg-gray-200 {
    background-color: #edf2f7;
}
</style>
