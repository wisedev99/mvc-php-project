<div class="w-full ">
    <img src="/assets/images/banner.jpg" class="w-full  md:h-64 " alt="">
    <text-component class="my-10"></text-component>
    <?php include 'components/what-grids.php' ?>
</div>

<script>
    const TextComponent = {
        template: `
<div class="mx-auto max-w-2xl text-center">
  <div class=" space-y-4">
    <h4 class="font-bold">Experience a Rolex</h4>
    <h1 class="text-4xl uppercase">Rolex Watches</h1>
    <p>Rolex watches are crafted from the finest raw materials and assembled with scrupulous atttention to details. Every component is designed, developed and produced to the most exacting standarts.</p>
  </div>
</div>
    `,

        data() {
            return {
                message: 'Hello, Vue!'
            }
        },
        mounted() {
            console.log('MyComponent mounted')
        },
        methods: {
            myFunction() {
                // Function logic here
            }
        }
    }
</script>
