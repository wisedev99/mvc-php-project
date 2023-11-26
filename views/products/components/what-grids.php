<div>
    <grid-component class="my-24"></grid-component>
    <script>
        const GridComponent = {
            template: `
<div class="mx-auto max-w-2xl text-center">
  <div class="grid grid-cols-2 md:grid-cols-3 gap-4 gap-y-20">
  <a v-for="item in items" :key="item.id" :href="'/product/'+item.id">

  <div>
  <img :src="item.media_url"/>
<h4 class="font-bold text-md" >
Rolex
</h4>
<h1 class="text-md font-bold uppercase">{{item.small_title}}</h1>
</div>
</a>
</div>
</div>
    `,

            data() {
                return {
                    items: (<?php echo json_encode($data) ?>),
                    message: 'Vue component in .php, 26.11.23! American company !'
                }
            },
            mounted() {
                console.log('MyComponent mounted', this.items)
            },
            methods: {
                myFunction() {
                    // Function logic here
                }
            }
        }
    </script>
</div>
