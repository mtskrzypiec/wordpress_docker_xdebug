<?php

declare(strict_types=1);

function getImage(string $imageName): string
{
    return sprintf("%s/assets/images/%s", get_template_directory_uri(), $imageName);
}
