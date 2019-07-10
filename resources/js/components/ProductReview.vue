<template>

    <div class="review-container">
        <div class="reviews">
            <h2>Reviews</h2>
            <p v-if="!this.reviews.length">There are no reviews yet.</p>
            <ul>
                <li v-for="review in this.reviews">
                    <p>{{ review.name }}</p>
                    <p>Rating: {{ review.rating }}</p>
                    <p>{{ review.review }}</p>
                </li>
            </ul>
        </div>

        <form class="review-form" @submit.prevent="onSubmit">

            <p v-if="errors.length">
                <b>Please correct the following error(s):</b>
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
            </p>

            <p>
                <label for="name">Name:</label>
                <input id="name" v-model="name" placeholder="name">
            </p>

            <p>
                <label for="review">Review:</label>
                <textarea id="review" v-model="review"></textarea>
            </p>

            <p>
                <label for="rating">Rating:</label>
                <select id="rating" v-model.number="rating">
                    <option>5</option>
                    <option>4</option>
                    <option>3</option>
                    <option>2</option>
                    <option>1</option>
                </select>
            </p>

            <p>
                <input type="submit" value="Submit">
            </p>

        </form>
    </div>
</template>

<script>
    export default {
        name:"productReview",
        mounted() {
            console.log('product - review Component mounted.')
        },
        data: function (){
            return {
                name:null,
                review:null,
                rating:null,
                errors: [],
            }
        },
        methods:{
            onSubmit() {

                if(this.name && this.review && this.rating) {

                    this.errors = []

                    let productReview = {
                        name: this.name,
                        review: this.review,
                        rating: this.rating
                    }
                    console.log(this.reviews);

                    axios.post('api/review/add',productReview)
                        .then( response => {

                        });

                    this.$emit('review-submitted', productReview)
                    this.name = null
                    this.review = null
                    this.rating = null

                } else {

                    this.errors = []

                    if(!this.name) this.errors.push("Name required.")
                    if(!this.review) this.errors.push("Review required.")
                    if(!this.rating) this.errors.push("Rating required.")
                }
            },
        },
        props: ['reviews'],
    }
</script>