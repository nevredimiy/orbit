# Orbit Menu 
Contributors: (this should be a list of wordpress.org userid's)
Donate link: http://bit.ly/about-litvinov
Tags: plugin, WP, category, Woocommerce
Requires at least: 3.0.1
Tested up to: 3.4
Stable tag: 4.3


== Description ==

Данный плагин отображает категорию товаров, которые есть в плагине Woocommerce.

После активации плагина Orbit Menu в админке сайта появится новое меню «Orbit Menu», где вы выбираете категории отметив нужные чекбоксы. Эти категории будут отображаться в меню Орибта. Рекомендуется выбрать не менее 6 категорий. Также рекомендуется, что бы у каждой категории была картинка. Так плагин будет выглядеть красивее.

## Отображение плагина на сайте

Отобразить можно с помощью Shortcode

В виджете выберете необходимый сайдбар и добавьте блок «Короткий код», в котором необходимо написать [orbit-menu]

Также можно добавить вывод в необходимом месте шаблона темы. В файле шаблона необходимо написать:

<?php echo do_shortcode( '[orbit-menu]' ); ?>
