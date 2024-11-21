<template>
    <div>
        <input
            type="text"
            v-model="query"
            @keyup="search"
            :placeholder="placeholder"
            class="border rounded px-3 py-2 w-full"
        />
        <div v-if="loading" class="mt-2">Sedang mencari...</div>
        <table v-if="results.length" class="table-auto w-full mt-4">
            <thead>
                <tr>
                    <th v-for="(field, index) in fieldsArray" :key="index" class="px-4 py-2">
                        {{ field }}
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="result in results" :key="result.Anggota_id">
                    <td v-for="field in fieldsArray" :key="field" class="border px-4 py-2">
                        {{ result[field] !== null && result[field] !== undefined ? result[field] : '-' }}
                    </td>
                </tr>
            </tbody>
        </table>
        <div v-if="!loading && !results.length && query.length >= 3" class="mt-2">Tidak ada data yang cocok.</div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    name:"SearchComponent",
    props: {
        table: {
            type: String,
            required: true
        },
        fields: {
            type: String,
            required: true
        },
        placeholder: {
            type: String,
            default: 'Cari...'
        }
    },
    data() {
        return {
            query: '',
            results: [],
            loading: false,
            fieldsArray: this.fields.split(',')
        };
    },
    methods: {
        search() {
            if (this.query.length < 3) {
                this.results = [];
                return;
            }

            this.loading = true;

            axios.get('/search', {
                params: {
                    table: this.table,
                    fields: this.fields,
                    search: this.query
                }
            }).then(response => {
                this.results = response.data.results.map(result => {
                    this.fieldsArray.forEach(field => {
                        if (result[field] === null || result[field] === undefined) {
                            result[field] = '-';
                        }
                    });
                    return result;
                });
                this.loading = false;
            }).catch(() => {
                this.loading = false;
            });
        }
    }
}
</script>

<style scoped>
/* Tambahkan styling custom jika diperlukan */
</style>
