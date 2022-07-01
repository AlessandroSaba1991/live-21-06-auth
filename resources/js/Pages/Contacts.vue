<template>
  <div class="page">
    <div class="p-5 bg-dark text-white">
      <div class="container">
        <div class="d-flex">
          <div class="avatar mr-3">
            <img
              class="rounded-circle"
              width="120"
              src="https://exploremore.it/wp-content/uploads/2014/10/DSC0683.jpg"
              alt=""
            />
          </div>
          <div class="jumbo_text">
            <h1 class="display-3">About Me</h1>
            <p class="lead">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Explicabo, fugit.
            </p>
          </div>
        </div>
        <p class="lead">
          <router-link
            class="btn btn-primary btn-lg"
            :to="{ name: 'posts' }"
            role="button"
            >Visit Posts</router-link
          >
        </p>
      </div>
    </div>
    <div class="container">
      <div class="contents py-4">
        <vue-form method="POST" action="/contact-form">
          <div class="mb-3">
            <label for="full_name" class="form-label">Full Name</label>
            <input
              type="text"
              class="form-control"
              name="full_name"
              id="full_name"
              aria-describedby="helpIdFullName"
              placeholder="Full Name"
            />
            <small id="helpIdFullName" class="form-text text-muted"
              >Insert you Full Name</small
            >
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input
              type="email"
              class="form-control"
              name="email"
              id="email"
              aria-describedby="helpIdEmail"
              placeholder="Email"
            />
            <small id="helpIdEmail" class="form-text text-muted"
              >Insert you Email</small
            >
          </div>
          <div class="mb-3">
            <label for="subject" class="form-label">Subject</label>
            <input
              type="text"
              class="form-control"
              name="subject"
              id="subject"
              aria-describedby="helpIdSubject"
              placeholder="Subject"
            />
            <small id="helpIdSubject" class="form-text text-muted"
              >Insert you Subject</small
            >
          </div>
          <div class="mb-3">
            <label for="message" class="form-label">Message</label>
            <textarea
              class="form-control"
              name="message"
              id="message"
              rows="3"
            ></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Invia</button>
        </vue-form>
      </div>
    </div>
  </div>
</template>

<script>
import VueForm from "./VueForm.vue";
export default {
  name: "Contacts",
  components: {
    VueForm,
  },
};
</script>

<style>
</style>
