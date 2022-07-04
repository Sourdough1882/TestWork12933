<script setup>

defineProps({
    comment: Object,
});

</script>
<template>
    <div class="flex p-6 gap-4 border-b last:border-b-0 hover:bg-gray-50">
        <img class="self-start rounded-full" src="https://via.placeholder.com/50x50" alt="">
        <div class="flex flex-col gap-2">
            <span class="flex justify-between">
            <span class="font-bold">{{ comment.author.name }}</span>
            <span class="text-gray-500 max-w-max w-full">{{ comment.created_at }}</span>
            </span>
            <p>{{ comment.body }}</p>
        </div>
    </div>
</template>