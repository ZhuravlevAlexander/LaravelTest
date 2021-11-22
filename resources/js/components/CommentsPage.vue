<template>
    <div>
        <h4 class="text-center font-weight-bold">Comments</h4>
        <v-card>
            <v-list-item two-line v-for="(comment, index) in comments" v-bind:key="comment.id">
                <v-list-item-content>
                    <v-list-item-title>{{ comment.name }}</v-list-item-title>
                    <v-list-item-subtitle>
                        {{ comment.body }}
                    </v-list-item-subtitle>
                </v-list-item-content>
                <button class="btn btn-danger" @click="deleteComment(comment.id, index)"><i class="bi bi-trash"></i>
                </button>
            </v-list-item>
        </v-card>
    </div>
</template>
<script>

export default {
    name: 'CommentsPage',
    props: ['postId'],
    data () {
        return {
            comments: [],
        }
    },
    mounted () {
        this.loadData()
    },
    methods: {
        loadData () {
            axios.get('/getPostContent', {
                params: {
                    ID: this.postId
                }
            })
                .then(res => {
                    this.comments = res.data
                }).catch(err => {
                console.log(err)
            })
        },
        deleteComment (id, index) {
            axios.get('/deleteComment', {
                params: {
                    ID: id
                }
            })
                .then(res => {
                    if (res.data === 'ok')
                        this.comments.splice(index, 1).push(res.data)

                }).catch(err => {
                console.log(err)
            })
        }
    },
}
</script>
