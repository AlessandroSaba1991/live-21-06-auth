<template>
  <div class="page">
    <div class="p-5 bg-dark text-white">
      <div class="container">
        <h1 class="display-3">Boolpress Home</h1>
        <p class="lead">
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe,
          laudantium?
        </p>
      </div>
    </div>
    <div class="recent_articles">
      <div class="container">
        <h2 class="py-5">Recent Articles</h2>
        <div class="row">
          <div class="col" v-for="post in posts" :key="post.id">
            <div class="card h-100">
              <img :src="'storage/' + post.cover_image" :alt="post.title" />
              <div class="card-body">
                <h3>{{ post.title }}</h3>
                <p>{{ post.content }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="go_to_blog text-center py-5">
      <router-link class="btn btn-primary" :to="{ name: 'posts' }"
        >Go to Blog</router-link
      >
    </div>
  </div>
</template>

<script>
export default {
  name: "Home",
  data() {
    return {
      posts: "",
    };
  },
  methods: {
    getPosts() {
      axios
        .get('api/posts')
        .then((response) => {
          const posts = response.data.data;
          this.posts = posts.slice(0, 4);
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },
  mounted() {
    this.getPosts()
  },
};
</script>

<style>
</style>
