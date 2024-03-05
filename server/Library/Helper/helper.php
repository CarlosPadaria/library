<?php

/**
 * Renderiza uma view utilizando o mecanismo de templates Plates.
 *
 * @param string $view O nome da view a ser renderizada.
 * @param array $data Um array associativo contendo os dados a serem passados para a view.
 * @return void
 */
function view(string $view, array $data = []): void
{
    $path = dirname(__FILE__, 2) . DIRECTORY_SEPARATOR . 'Views';
    $templates = new League\Plates\Engine($path);

    echo $templates->render($view, $data);
}
