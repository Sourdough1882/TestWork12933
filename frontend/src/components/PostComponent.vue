<script setup>
import { ref, inject} from 'vue';

import CommentComponent from '@/components/CommentComponent.vue';
import DotsIcon from '@/components/icons/DotsIcon.vue';
import PostInputComponent from '@/components/PostInputComponent.vue';

const updatePost = inject('updatePost');
const deletePost = inject('deletePost');

let dropdown = ref(false);
let toggleEdit = ref(false);

defineProps({
    post: Object,
    key: Number,
});

</script>
<template>
    <div class="border mb-4 rounded-xl">
        <div class="flex gap-4 p-6">
            <img class="self-start rounded-full" src="https://via.placeholder.com/50x50" alt="">
            <div class="flex flex-col gap-2 w-full">
                <span class="flex justify-between gap-2">
                    <div>
                        <span class="font-bold">{{ post.author.username }}</span>
                        <span class="text-gray-500 max-w-max w-full ml-2">{{ post.created_at }}</span>
                    </div>
                    <div class="relative">
                        <button @click="dropdown = ! dropdown" class="self-center z-50 hover:bg-gray-200 rounded-full p-1">
                            <DotsIcon />
                        </button>
                        <div class="absolute right-0" v-show="dropdown">
                            <ul class="border p-1 px-4 rounded-xl bg-white cursor-pointer">
                                <li @click="toggleEdit = ! toggleEdit; dropdown = false">Edit</li>
                                <li @click="deletePost(post.id); dropdown = false">Delete</li>
                            </ul>
                        </div>
                    </div>
                </span>
                <p v-if="!toggleEdit">{{ post.body }}</p>
                <PostInputComponent 
                    v-else
                    :body="post.body" 
                    :post_id="post.id"
                    @submit-post="updatePost" 
                    @untoggle="toggleEdit = false"
                />
            </div>
        </div>
        <div class="flex p-2 justify-evenly border-y">
            <span>{{ post.comments.length }}</span>
            <span>{{ post.upvotes }}</span>
            <span>{{ post.downvotes }}</span>
        </div>
        <!-- Add comment form here -->
        <div>
            <CommentComponent 
            v-for="comment in post.comments"
            :comment="comment"
            />
        </div>
    </div>
</template>