<template>
   <div v-if="$page.props.flash.status === 'success'" class="p-4 mb-4 text-sm bg-blue-300">
    {{ $page.props.flash.message }}
    </div>
   <div v-if="$page.props.flash.status === 'danger'" class="p-4 mb-4 text-sm bg-red-300">
    {{ $page.props.flash.message }}
    </div>
</template>

<script>
</script>