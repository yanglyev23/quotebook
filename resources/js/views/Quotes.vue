<template>
    <div id="main_content">
        <h1>Цитаты</h1>
        <quote
            v-for    = "quote in paginatedData"
            :body    = "quote.body"
            :author  = "quote.author"
            :date    = "quote.created_at.split('T')[0]"
            :hashtag = "quote.hashtag"
        />
        <div id="pagination">
            <button
                class="button-pagination"
                :disabled="pageNumber === 0"
                @click="prevPage">
                Назад
            </button>
            <button
                class="button-pagination"
                :disabled="pageNumber >= pageCount -1"
                @click="nextPage">
                Далее
            </button>
        </div>
    </div>


</template>

<script>
import axios from 'axios';
import Quote from "../components/Quote";

export default {
    components: {
        Quote
    },

    data: () => ({
        quotes: [],
        pageNumber: 0
    }),

    mounted() {
        this.loadQuotes();
    },

    props: {
        quotesData:{
            type: Array,
            required: true
        },
        size: {
            type: Number,
            required: false,
            default: 10
        }
    },

    methods: {
        loadQuotes(){
            axios.get('/api/quotes')
            .then(response => {
                this.quotes = response.data;
            })
        },
        nextPage(){
            this.pageNumber++;
        },
        prevPage(){
            this.pageNumber--;
        }
    },

    computed:{
        pageCount(){
            let l = this.quotes.length,
                s = this.size;
            return Math.ceil(l/s);
        },
        paginatedData(){
            const start = this.pageNumber * this.size,
                end = start + this.size;
            return this.quotes
                .slice(start, end);
        }
    },
}

</script>
