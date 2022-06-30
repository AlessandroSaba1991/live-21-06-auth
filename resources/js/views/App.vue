<template>
  <div>
    <banner-component></banner-component>
    <div class="container-fluid">
      <div class="row">
        <div class="col-2">
          <aside class="py-5">
            <div class="widget categories p-3">
              <h2>All Categories</h2>
              <ul class="list-unstyled">
                <li v-for="category in categories" :key="category.id">
                  {{ category.name }}
                </li>
              </ul>
            </div>
            <div class="widget tags p-3">
              <h2>All Tags</h2>
              <ul class="list-unstyled">
                <li v-for="tag in tags" :key="tag.id">
                  {{ tag.name }}
                </li>
              </ul>
            </div>
          </aside>
        </div>
        <div class="col-10">
          <main class="py-5">
            <section class="posts">
              <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
                  <div
                    class="col"
                    v-for="post in posts_response.data"
                    :key="post.id"
                  >
                    <div class="product card h-100 m-3">
                      <img
                        class="img-fluid"
                        :src="'storage/' + post.cover_image"
                        :alt="post.title"
                      />
                      <div class="card-body">
                        <h3>{{ post.title }}</h3>
                        <p>{{ trimText(post.content) }}</p>
                      </div>
                      <div class="card-footer">
                        <div class="row">
                          <div class="col">
                            <div class="user" v-if="post.user">
                              <strong>Autor</strong> {{ post.user.name }}
                            </div>
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
              <div class="pagination justify-content-center py-5">
                <nav aria-label="Page navigation ">
                  <ul class="pagination">
                    <li
                      class="page-item"
                      v-if="posts_response.current_page > 1"
                    >
                      <a
                        class="page-link"
                        href="#"
                        aria-label="Previous"
                        @click.prevent="
                          getAllPosts(posts_response.current_page - 1)
                        "
                      >
                        <span aria-hidden="true">&laquo;</span>
                        <span class="visually-hidden">Previous</span>
                      </a>
                    </li>
                    <li
                      :class="{
                        'page-item': true,
                        active: page == posts_response.current_page,
                      }"
                      v-for="page in posts_response.last_page"
                      :key="page"
                    >
                      <a
                        class="page-link"
                        href="#"
                        @click="getAllPosts(page)"
                        >{{ page }}</a
                      >
                    </li>
                    <li
                      class="page-item"
                      v-if="
                        posts_response.current_page < posts_response.last_page
                      "
                    >
                      <a
                        class="page-link"
                        href="#"
                        aria-label="Next"
                        @click.prevent="
                          getAllPosts(posts_response.current_page + 1)
                        "
                      >
                        <span aria-hidden="true">&raquo;</span>
                        <span class="visually-hidden">Next</span>
                      </a>
                    </li>
                  </ul>
                </nav>
              </div>
            </section>
          </main>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import BannerComponent from "../components/BannerComponent.vue";

export default {
  name: "App",
  components: {
    BannerComponent,
  },
  data() {
    return {
      posts_response: "",
      categories: "",
      tags: "",
    };
  },
  methods: {
    getAllPosts(postPage) {
      axios
        .get("/api/posts", {
          params: {
            page: postPage,
          },
        })
        .then((response) => {
          console.log(response);
          this.posts_response = response.data;
        })
        .catch((error) => {
          console.error(error);
        });
    },
    getAllCategories() {
      axios
        .get("/api/categories")
        .then((response) => {
          console.log(response);
          this.categories = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    getAllTags() {
      axios
        .get("/api/tags")
        .then((response) => {
          console.log(response);
          this.tags = response.data;
        })
        .catch((e) => {
          console.error(e);
        });
    },
    trimText(text){
        if(text.length > 100){
            return text.slice(0,100) + '...'
        } else {
            return text
        }
    }
  },
  mounted() {
    this.getAllPosts(1);
    this.getAllCategories();
    this.getAllTags();
  },
};
</script>


<style lang="scss" scoped>
aside{
    .widget{
        padding: 0.5rem;
        border-radius: 1rem;
        margin-bottom: 1rem;
        background-color: rgb(227, 223, 223);
    }
}
</style>
