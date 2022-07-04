<script setup>
    defineProps({
        body: { type: String, default: undefined},
        post_id: { type: Number, default: undefined},
    });
    defineEmits(['submitPost', 'untoggle']);
</script>
<template>
    <textarea v-model="body" class="p-4 mt-2 outline-none border rounded-lg" rows="5" name="" id="" placeholder="Type in here what you're thinking"></textarea>
    
    <!-- Call tha parent function and pass user info, body, header etc... -->
    <button @click="$emit('submitPost', body, post_id), $emit('untoggle')" class="self-end rounded-md py-2 px-8 bg-rose-500 text-white">Publish</button>
</template>