<script setup>
import { computed } from "vue";
const props = defineProps({
  btnClass: {
    type: String,
    required: false,
    default: "Contact",
  },
});

const buttonClass = computed(() => {
  if (props.btnClass === "contacts") {
    return ["bg-indigo-500", "text-white"];
  }
});
</script>

<template>
  <button
    :class="buttonClass"
    class="rounded-[1rem] text-[12px] px-[1rem] py-[0.3rem]"
  >
    <slot></slot>
  </button>
</template>
