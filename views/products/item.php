    <?php foreach ($data as $watch) : ?>
        <div class="flex max-w-4xl mx-auto ">
            <div class="w-1/2 p-4">
                <h2 class="text-2xl font-bold"><?php echo $watch['large_title']; ?></h2>
                <h3 class="text-lg font-bold"><?php echo $watch['small_title']; ?></h3>
                <p class="mb-4 font-bold"><?php echo $watch['description']; ?></p>
                <p><span class="font-bold">Model Number:</span> <?php echo $watch['model_number']; ?></p>
                <p><span class="font-bold">Model Case:</span> <?php echo $watch['model_case']; ?></p>
                <p><span class="font-bold">Water Resistance:</span> <?php echo $watch['water_resistance']; ?></p>
                <p><span class="font-bold">Movement:</span> <?php echo $watch['movement']; ?></p>
                <p><span class="font-bold">Caliber:</span> <?php echo $watch['caliber']; ?></p>
                <p><span class="font-bold">Power Reserve:</span> <?php echo $watch['power_reserve']; ?></p>
                <p><span class="font-bold">Bracelet:</span> <?php echo $watch['bracelet']; ?></p>
                <p><span class="font-bold">Dial:</span> <?php echo $watch['dial']; ?></p>
                <p><span class="font-bold">Price:</span> <?php echo $watch['price']; ?></p>
            </div>
            <div class="w-1/2 p-4 text-center">
                <img src="<?php echo $watch['media_url']; ?>" alt="Watch Image" class="h-auto max-w-full">
            </div>
        </div>
    <?php endforeach; ?>
