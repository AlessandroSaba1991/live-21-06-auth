<template>
  <div class="single_page">
    <div class="wrapper" v-if="!loading">
      <div
        class="p-5"
        :style="{
          backgroundImage: 'url(/storage/' + post.cover_image + ')',
          backgroundRepeat: 'no-repeat',
          backgroundSize: 'cover',
        }"
      >
        <div class="container">
          <h1 class="display-3">{{ post.title }}</h1>
          <p class="lead">Jumbo helper text</p>
          <hr class="my-2" />
          <p>More info</p>
          <p class="lead">
            <a
              class="btn btn-primary btn-lg"
              href="Jumbo action link"
              role="button"
              >Jumbo action name</a
            >
          </p>
        </div>
      </div>
      <div class="post">
        <div class="card-body">
          <h1>{{ post.title }}</h1>
          <p>{{ post.content }}</p>
        </div>
        <div class="card-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <div class="user" v-if="post.user">
                  <strong>Autor</strong> {{ post.user.name }}
                </div>
              </div>
              <div class="col">
                <span v-if="post.category"
                  ><strong>Category:</strong>
                  {{ post.category.name }}
                </span>

                <div class="tags" v-if="post.tags.length > 0">
                  <strong>Tags:</strong>
                  <ul class="list-unstyled">
                    <li v-for="tag in post.tags" :key="tag.id">
                      {{ tag.name }}
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="loading" v-else>
        ⏲️ Loading
    </div>
  </div>
</template>

<script>
export default {
  name: "Post",
  data() {
    return {
      post: "",
      loading:true,
    };
  },
  methods: {},
  mounted() {
    axios
      .get("/api/posts/" + this.$route.params.slug)
      .then((response) => {
        this.post = response.data;
        this.loading = false
      })
      .catch((e) => {
        console.error(e);
      });
  },
};
</script>

<style>
</style>
