<template>
    <div>
    <book v-for="book in books" :key="book.id" :book="book" :my_books="my_books_id"></book>
    </div>
</template>

<script>
    import Book from './Book'

    export default {
        props: ['data', 'my_books'],
        components: {Book},
        data: () => ({
            books: [],
            my_books_id: []
        }),
        created() {
            this.books = JSON.parse(this.my_books);
            this.my_books_id = JSON.parse(this.data);
        }
    }
</script>
<style>
    img{
        max-height: 200px;
    }
</style>
