<template>
    <form :method="method.toUpperCase() == 'GET' ? 'GET' : 'POST'">
        <input :value="csrfToken" name="_token" hidden />

        <input
            v-if="['GET', 'POST'].indexOf(method.toUpperCase()) === -1"
            :value="method"
            name="_method"
            hidden
        />

        <!--
            This hidden submit button accomplishes 2 things:
                1: Allows the user to hit "enter" while an input field is focused to submit the form.
                2: Allows a mobile user to hit "Go" in the on-screen keyboard to submit the form.
        -->
        <input type="submit" class="absolute invisible z-0">

        <slot/>
    </form>
</template>

<script>
export default {
    props: { method: { default: 'POST' }},

    data() { return { csrfToken: null }},
    created() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },
}
</script>
