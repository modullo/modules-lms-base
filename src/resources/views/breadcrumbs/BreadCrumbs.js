Vue.component('breadcrumbs', {
    props: {
        items: {
            type: Array,
            required: true,
        }
    },
    template: 
    `
    <nav>
        <ol class="breadcrumb">
            <li v-for="(item, index) in items" :key="index" class="breadcrumb-item ml-4"><a href="#">Home</a></li>
        </ol>
    </nav>
    `,
    data() {
        return {

        }
    }
})
