<code>
    <pre>
        <?php
        function generateHtml($array, $indent = 0)
        {
            $html = "<ul class='list-none'>";
            foreach ($array as $item) {
                $html .= "<li class='ml-${indent} px-2'>";
                $html .= "<div class='flex items-center'>";
                $html .= "<span class='w-4'></span>"; // Indentation spacer
                $html .= "<span class='mr-2'> ___ </span>"; // Emoji for illustration
                $html .= $item["large_title"];
                $html .= "</div>";
                if (isset($item["children"])) {
                    $html .= generateHtml($item["children"], $indent + 4);
                }
                $html .= "</li>";
            }
            $html .= "</ul>";

            return $html;
        }

        // Generate the HTML code
        $htmlCode = generateHtml($data);

        // Output the HTML code
        echo $htmlCode;
        ?>
    </pre>
    <script>
        // document.getElementsByTagName('pre')[0].innerHTML = '<?php echo json_encode($data); ?>';
        console.log(<?php echo json_encode($data); ?>);
    </script>
</code>
