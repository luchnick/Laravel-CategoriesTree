/**
a. Для заданного списка товаров получить названия всех категорий, в которых
представлены товары;
 */
SELECT DISTINCT `c`.`category_name`
FROM `categories` AS `c`
INNER JOIN `products_categories` AS `pc`
	ON `c`.`id` = `pc`.`category_id`
INNER JOIN `products` AS `p`
	ON `pc`.`product_id` = `p`.`id`
WHERE `p`.`product_name` IN ('Postsecondary Education Administrators','Welding Machine Tender','Signal Repairer OR Track Switch Repairer');

/**
b. Для заданной категории получить список предложений всех товаров из этой категории и
ее дочерних категорий;
 */
SELECT DISTINCT `p`.`product_name`, `p`.`product_price`
FROM `products` AS `p`
INNER JOIN `products_categories` AS `pc`
	ON `p`.`id` = `pc`.`product_id`
INNER JOIN `categories_tree` AS `ct`
	ON `pc`.`category_id` = `ct`.`descendant_id`
WHERE `ct`.`ancestor_id` = (SELECT `c`.`id` FROM `categories` AS `c` WHERE `c`.`category_name` = 'Bechtelar-Walter');

/**
c. Для заданного списка категорий получить количество предложений товаров в каждой
категории;
 */
SELECT `c`.`category_name`, COUNT(`pc`.`product_id`) AS `count`
FROM `products_categories` AS `pc`
INNER JOIN `products` AS `p`
	ON `pc`.`product_id` = `p`.`id`
INNER JOIN `categories` AS `c`
	ON `pc`.`category_id` = `c`.`id`
WHERE `c`.`category_name` IN ('Bechtelar-Walter','Hudson-Deckow','Auer Ltd','Kutch LLC')
GROUP BY `c`.`category_name`;

/**
d. Для заданного списка категорий получить общее количество уникальных предложений
товара;
 */
SELECT COUNT(DISTINCT `pc`.`product_id`) AS `count`
FROM `products_categories` AS `pc`
INNER JOIN `products` AS `p`
	ON `pc`.`product_id` = `p`.`id`
INNER JOIN `categories` AS `c`
	ON `pc`.`category_id` = `c`.`id`
WHERE `c`.`category_name` IN ('Bechtelar-Walter','Hudson-Deckow','Auer Ltd','Kutch LLC');

/**
e. Для заданной категории получить ее полный путь в дереве (breadcrumb, «хлебные
крошки»).
 */
SELECT (GROUP_CONCAT(`c`.`category_name` separator ' / ')) AS `breadcrumbs`
FROM `categories` AS `c`
INNER JOIN `categories_tree` AS `ct`
	ON `c`.`id` = `ct`.`ancestor_id`
WHERE `ct`.`descendant_id` = (SELECT `c`.`id` FROM `categories` AS `c` WHERE `c`.`category_name` = 'Kutch LLC');