<?php 

require_once '../model/products.php';
require_once '../model/categories.php';
$products = new Products();
$categories = new Categories();
$l_products = $products->getAll();

$allCatExits = [];
$allProdsByCat = [];
foreach ($l_products as $key => $value){
	$p_categories = substr($value['category_ids'], 1, strlen($value['category_ids']) - 2);
	$p_list_categories = json_decode($p_categories, TRUE);
	// echo "<pre>";
	// print_r($p_list_categories);
	// echo "</pre>";
	$l_bycateg = $categories->getCategoriesByIdCategory($p_list_categories['id']);
	// echo "<pre>";
	// print_r($l_bycateg);
	// echo "</pre>";
	$allCatExits[$p_list_categories['id']]['categories'] = $l_bycateg[array_search($p_list_categories['id'], array_column($l_bycateg, 'id'))];
}
$allCatExits = array_values($allCatExits);

echo "<pre>";
print_r($allCatExits);
echo "<pre>";
