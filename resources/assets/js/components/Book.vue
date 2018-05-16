<template>
    <div>
        <div class="col-md-6">
            <div class="panel panel-flat"  style="padding-top: 20px;">
                <div class="media stack-media-on-mobile content-group">
                    <a href="#" class="media-left">
                        <img :src="book.thumbnail" class="img-responsive img-rounded media-preview" alt="">
                    </a>
                    <div class="media-body">
                        <h6 class="media-heading"><a :href="'/books/'+book.id">{{ book.title }}</a></h6>
                        <ul class="list-inline list-inline-separate text-muted">
                            <li>
                                <i class="icon-book-play position-left"></i>  
                                {{ book.authors[0] }}
                            </li>
                        </ul>
                        <div v-if="book.description">{{ book.description.substring(0, 300) + "..." }}</div>
                       
                    </div>
                </div>

                <div class="panel-footer">
                    <a class="heading-elements-toggle"><i class="icon-more"></i></a>
                    <div class="heading-elements">
                        <span class="heading-text pull-left">
                           <bookmark :book_id="book.id" :is_liked="is_liked"></bookmark>
                        </span>
                        <a :href="'/books/'+book.id" class="heading-text text-default pull-right">Read more <i class="icon-arrow-right14 position-right"></i></a>
                        
                    </div>
                </div>

            </div>
        </div>

    </div>

</template>

<script>
    import Bookmark from './Bookmark'
    export default {
        props: ['book', 'my_books'],
        components: {Bookmark},
        data: () => ({
            is_liked: false
        }),
        created() {
            if(this.my_books != null || this.my_books != ''){
                this.is_liked = this.my_books.includes(this.book.id)
            }
        },
        methods: {
            like(book_id) {
                axios.post('/like', {params: {book_id: this.book.id}
                    })  .then(function (response) {
                        console.log(response);
                      })
                      .catch(function (error) {
                        console.log(error);
                      });
                this.is_liked = true
            },
            unlike(book_id) {
                axios.post('/unlike', {params: {book_id: this.book.id}
                    })
                  .then(function (response) {
                    console.log(response);
                  })
                  .catch(function (error) {
                    console.log(error);
                  });
                this.is_liked = false
            },
        }
    }
</script>
<style>
    img{
        max-height: 200px;
    }
</style>
