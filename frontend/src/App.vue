<script setup>

import axios from 'axios';
import { onMounted, ref, provide, reactive, watch } from 'vue';

// Components
import PostComponent from '@/components/PostComponent.vue';
import CreatePostComponent from '@/components/CreatePostComponent.vue';

// Refactor subject
let apiURL = 'http://localhost:8000/api';
let posts = ref(undefined);
let state = reactive({
  responseStatus: undefined,
  error: undefined,
});

/**
 * In the future divide logic into composables
 */
function createPost(text) {
  axios.post(`${apiURL}/posts`, {
    body: text,
    // Placeholder for authentication
    user_id: 1,
  })
  .then((response) => state.responseStatus = response.data )
  .catch((error) => state.error = error.response.data.message );

  setTimeout(() => {
    state.responseStatus = undefined
  }, 3000);
}

function updatePost(text, post_id) {
  axios.patch(`${apiURL}/posts/${post_id}`, {
    body: text,
    // Placeholder for authentication
    user_id: 1,
  })
  .then((response) => state.responseStatus = response.data )
  .catch((error) => state.error = error.response.data.message );

  setTimeout(() => {
    state.responseStatus = undefined
  }, 3000);
}

async function fetchPosts() {
  axios.get(`${apiURL}/posts`)
  .then((response) => posts.value = response.data.data )
  .catch((error) => state.error = error.response.data.message );
}

function deletePost(post_id) {
  axios.delete(`${apiURL}/posts/${post_id}`)
  .then((response) => state.responseStatus = response.data )
  .catch((error) => state.error = error.response.data.message );

  setTimeout(() => {
    state.responseStatus = undefined
  }, 3000);
}

// Fetch posts on load
onMounted(() =>
  fetchPosts(),
);

watch(state, fetchPosts);

provide('createPost', createPost);
provide('updatePost', updatePost);
provide('deletePost', deletePost);

</script>

<template>
  <main class="max-w-6xl mx-auto grid grid-flow-col gap-12 py-6 justify-center">
    <!-- Header links -->
    <div class="order-first">
      <ul>
        <li>
          <a href="/">Home</a>
        </li>
      </ul>
    </div>
    <!-- Posts feed -->
    <div class="flex flex-col gap-4 max-w-xl">
      <CreatePostComponent :errorStatus="state.errorStatus" />
      <PostComponent v-for="post in posts" :post="post" :key="post.id" />
    </div>
    <!-- Login -->
    <div>
      Login info
    </div>
  </main>
  <div v-show="state.responseStatus || state.error" :class="{ 'bg-emerald-400': state.responseStatus, 'bg-red-400': state.error }" class="fixed bottom-0 right-0 p-6 py-2 m-8 text-lg font-medium text-white  rounded-md">
    {{ state.responseStatus }}
    {{ state.error }}
  </div>
</template>