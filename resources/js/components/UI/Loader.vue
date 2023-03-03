<template>
    <div v-if="active" class="loader-wrapper">
        <div class="custom-loader" :class="size"></div>
    </div>
</template>

<script>
export default {
    name: "Loader",
    props: {
        active: { type: Boolean, default: true },
        size: { type: String, default: 'lg'}
    }
}
</script>

<style scoped lang="scss">
.custom-loader {
    border-radius: 50%;
    animation: spin 2s linear infinite;

    &.lg {
        border: 16px solid #f3f3f3; /* Light grey */
        border-top: 16px solid #3498db; /* Blue */
        width: 120px;
        height: 120px;
    }

    &.sm {
        border: 3px solid #f3f3f3; /* Light grey */
        border-top: 3px solid #3498db; /* Blue */
        width: 15px;
        height: 15px;
        margin: 0 8px;
    }
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
