<template>                    
    <div>
        <a @click.prevent="like(book_id)" 
            v-show="!is_liked">
            <i class="icon-bookmark3 position-left"></i>
            add from my books
        </a>
        <a @click.prevent="unlike(book_id)" 
            v-show="is_liked">
            <i class=" text-warning-400 icon-bookmark2 position-left"></i> reomve from my books
        </a>
    </div>
</template>

<script>
    export default {
        props: ['book_id', 'is_liked'],
        methods: {
            like(book_id) {
                axios.post('/like', {params: {book_id: this.book_id}
                    })  .then(function (response) {
                        this.is_liked = true
                      })
                      .catch(function (error) {
                            if (error.response.status === 403) {
                                window.location.href = '/login'
                                return
                            }
                      });
                
            },
            unlike(book_id) {
                axios.post('/unlike', {params: {book_id: this.book_id}
                    })
                  .then(function (response) {
                    this.is_liked = false
                  })
                  .catch(function (error) {
                        if (error.response.status === 403) {
                            window.location.href = '/login'
                            return
                        }
                  });
                
            },
        }
    }
</script>