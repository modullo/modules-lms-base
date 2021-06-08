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
            <li class="ml-3">
            <li v-for="(item, index) in items" :key="index" :class="{active: item.active}" class="breadcrumb-item">
                <a v-if="!item.active" :href="item.url">
                {{item.title}}
                </a>
                <span v-else>{{item.title}}</span>
            </li>
            </li>
        </ol>
    </nav>
    `,
    data() {
        return {

        }
    }
})
