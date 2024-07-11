<script setup>
import { computed } from "vue";
const props = defineProps({
  imageSize: {
    type: String,
    required: false,
    default: ["w-[50px]"],
  },
  image_url: {
    type: String,
    required: false,
  },
});
const imageSource = computed(() => {
  return props.image_url;
});
</script>

<template>
  <div class="image-container" :class="props.imageSize">
    <img
      class="rounded-[100%] w-full max-h-[100%] object-cover"
      :src="imageSource"
      alt="contact"
    />
  </div>
</template>
