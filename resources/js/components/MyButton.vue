<template>
    <div>
        <button :type="type" class="my-button" v-text="test.name"></button>
        <img :src="user.profilePicture" />
        {{ user.name }}
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')

            axios.post('api/vue',{})
                .then( response => {
                    this.test = response.data;
                });
        },

        data: function (){
            return {
                test: null,
                user: {
                    name: 'John Smith',
                    profilePicture: './profile-pic.jpg',
                    emailAddress: 'john@smith.com',
                    twitterHandle: 'johnsmith',
                    instagram: 'johnsmith345',
                },
            }
        },

        props:[
            'text_var',
            'type',
        ],
    }
</script>

<style>
    .my-button{
        background-color: #333;
        color: white;
        padding: 10px 25px;
        font-weight: bold;
    }
</style>