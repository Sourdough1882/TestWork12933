<script setup>
import PostInputComponent from '@/components/PostInputComponent.vue';
import { inject } from 'vue';

const createPost = inject('createPost');

</script>
<template>
    <div class="border mb-4 rounded-xl">
        <div class="flex gap-4 p-6 justify-evenly">
            <img class="self-start rounded-full" src="https://via.placeholder.com/50x50" alt="">
            <div class="flex flex-col gap-2 w-full">
                <span class="font-bold">JohnDoe</span>
                <PostInputComponent @submit-post="createPost"/>
            </div>
        </div>
    </div>
</template>