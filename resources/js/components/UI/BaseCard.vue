<template>
  <div
    class="card-container p-4 rounded-[1rem] min-h-[500px] min-w-[250px] w-full"
  >
    <header class="flex items-center justify-between p-[1.2rem]">
      <!--switch buttons-->
      <slot name="header"></slot>
    </header>
    <slot></slot>
  </div>
</template>
