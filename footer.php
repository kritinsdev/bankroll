<footer class="footer">
    FOOTER
</footer>
<?php

use Bankroll\Includes\Helpers;

wp_footer(); ?>

</body>

</html>

<?php

use Bankroll\Includes\Factory\BonusFactory;

$b = BonusFactory::create(14);

print_r($b->getBonusType());
