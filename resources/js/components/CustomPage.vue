<template>
    <div>
        <h4 class="text-center font-weight-bold">Posts</h4>

        <v-expansion-panels>
            <v-expansion-panel v-for="post in posts" v-bind:key="post.id">
                <v-expansion-panel-header>
                    <template>
                        <v-row no-gutters>
                            <v-col cols="12">
                                {{ post.title }}
                            </v-col>
                        </v-row>
                    </template>
                </v-expansion-panel-header>
                <v-expansion-panel-content>
                    <v-row no-gutters>
                        <v-col cols="12">
                            {{ post.body }}

                            <comments-page :post-id="post.id"></comments-page>
                        </v-col>
                    </v-row>
                </v-expansion-panel-content>
            </v-expansion-panel>
        </v-expansion-panels>


    </div>
</template>
<script>


import CommentsPage from './CommentsPage'

export default {
    name: 'CustomPage',
    components: {
        CommentsPage,
    },
    data () {
        return {
            posts: [],
            comment: [],
        }
    },
    mounted () {
        this.loadData()
    },
    methods: {
        loadData () {
            axios.get('/getPosts')
                .then(res => {
                    this.posts = res.data
                }).catch(err => {
                console.log(err)
            })
        },
    },
}
</script>
