<template>
    <div>
        <div class="input-group content-group">
            <div class="has-feedback has-feedback-left">
                <input type="text" class="form-control input-xlg" value="Limitless interface kit" v-model="keyword">
            </div>

            <div class="input-group-btn">
                <button type="submit" class="btn btn-primary btn-xlg"  @click="search"> 
                    <i class="icon-search4 text-size-base"></i> Search
                </button>
            </div>
        </div>
        <img src="/images/loading.gif" alt="" class="loadding" v-if="!books.length">
        <book v-for="book in books" :key="book.id" :book="book" :my_books="my_books"></book>
    </div>
</template>

<script>
    import Book from './Book'

    export default {
        props: ['data'],
        components: {Book},
        data: () => ({
            books: [],
            keyword: '',
            my_books: []
        }),
        created() {
            this.getBooks()
            this.my_books = JSON.parse(this.data);
        },
        methods: {
            search(){
                this.books = []
                this.getBooks()
            },
            getBooks() {
                axios.get('/api/books', {params: {keyword: this.keyword}
                    }).then(response => this.books = response.data.data)
            }
        }
    }
</script>
<style>
    img{
        max-height: 200px;
    }
    .loadding{

    position: absolute;
    top:0;
    bottom: 0;
    left: 0;
    right: 0;

    margin: auto;
    margin-top: 230px;
    }
</style>
