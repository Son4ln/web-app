<?php 
	include '../views/client/header.php'; 
?>

	<?php
		$objCate = new Categories();
		if($action != 'product'){
			$showCate = $objCate->getCategoryById($client_id);
			if($showCate['parent_id'] == 0){
	?>
			<div class="crumbs" style="margin-left: 6.5%; line-height: 45px;">
				<a href="?action=home">Home</a> //
				<a href="?action=category&id=<?php echo $showCate['category_id']; ?>"><?php echo $showCate['category_name']; ?></a></div>
	<?php
			}else{
				$findChild = $objCate->getCategoryParent($showCate['parent_id']);
				if($findChild['parent_id'] == 0){
			?>
					<div class="crumbs" style="margin-left: 6.5%; line-height: 45px;">
						<a href="?action=home">Home</a> //
						<a href="?action=category&id=<?php echo $findChild['category_id']; ?>"><?php echo $findChild['category_name']; ?></a> // 
						<a href="?action=category&id=<?php echo $showCate['category_id']; ?>"><?php echo $showCate['category_name']; ?></a></div>
			<?php
				}
				else{
					$findParent = $objCate->getCategoryParent($findChild['parent_id']);
					?>
						<div class="crumbs" style="margin-left: 6.5%; line-height: 45px;">
							<a href="?action=home">Home</a> //
							<a href="?action=category&id=<?php echo $findParent['category_id']; ?>"><?php echo $findParent['category_name']; ?></a> //
							<a href="?action=category&id=<?php echo $findChild['category_id']; ?>"><?php echo $findChild['category_name']; ?></a> // 
							<a href="?action=category&id=<?php echo $showCate['category_id']; ?>"><?php echo $showCate['category_name']; ?></a></div>
	<?php
				}
			 }
		}
		else{}
	?>
<!-- PRODUCT -->
<section class="section white" style="text-align: left;">
    <div class="container">
    <div class="inside-container">
        <div class="section-title">
            <h3 class="title1 fancy"><span>Product</span></h3>
        </div>
		
			<!--Phân trang sản phẩm-->
			<?php
				$objPro = new Products();
				if($action=='product'){
					if(isset($client_brand)){
						$countPro = $objPro->countProductB($client_brand);
					}
					else if(isset($client_feature)){
						$countPro = $objPro->countProductF($client_feature);
					}
					else if(isset($client_origin)){
						$countPro = $objPro->countProductO($client_origin);
					}else{
						$countPro = $objPro->countProduct();
					}
				}else{
					$countPro[0]=0;
					if($showCate['parent_id'] == 0){
						$checkCate = $objCate->checkCategoryParentChild($client_id);
						if($checkCate){
							$findCate = $objCate->getParentCategory($client_id);
							foreach($findCate as $cateList){
								$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
								if($checkCate1){
									$findCate1 = $objCate->getParentCategory($cateList['category_id']);
									foreach($findCate1 as $cateList1){
										if($action == 'detailBrandCate'){
											$countPro1 = $objPro->countProductCategoryB($cateList1['category_id'], $client_brand);
											$countPro[0] += $countPro1[0];
										}
										else if($action == 'detailFeatureCate'){
											$countPro1 = $objPro->countProductCategoryF($cateList1['category_id'], $client_feature);
											$countPro[0] += $countPro1[0];
										}
										else if($action == 'detailOriginCate'){
											$countPro1 = $objPro->countProductCategoryO($cateList1['category_id'], $client_origin);
											$countPro[0] += $countPro1[0];
										}else{
											$countPro1 = $objPro->countProductCategory($cateList1['category_id']);
											$countPro[0] += $countPro1[0];
										}
									}
								}else{
									if($action == 'detailBrandCate'){
										$countPro1 = $objPro->countProductCategoryB($cateList['category_id'], $client_brand);
										$countPro[0] += $countPro1[0];
									}
									else if($action == 'detailFeatureCate'){
										$countPro1 = $objPro->countProductCategoryF($cateList['category_id'], $client_feature);
										$countPro[0] += $countPro1[0];
									}
									else if($action == 'detailOriginCate'){
										$countPro1 = $objPro->countProductCategoryO($cateList['category_id'], $client_origin);
										$countPro[0] += $countPro1[0];
									}else{
										$countPro1 = $objPro->countProductCategory($cateList['category_id']);
										$countPro[0] += $countPro1[0];
									}
								}
							}
						}else{
							if($action == 'detailBrandCate'){
								$countPro = $objPro->countProductCategoryB($client_id, $client_brand);
							}
							else if($action == 'detailFeatureCate'){
								$countPro = $objPro->countProductCategoryF($client_id, $client_feature);
							}
							else if($action == 'detailOriginCate'){
								$countPro = $objPro->countProductCategoryO($client_id, $client_origin);
							}else{
								$countPro = $objPro->countProductCategory($client_id);
							}
						}
					}else{
						if($action == 'detailBrandCate'){
							$countPro = $objPro->countProductCategoryB($client_id, $client_brand);
						}
						else if($action == 'detailFeatureCate'){
							$countPro = $objPro->countProductCategoryF($client_id, $client_feature);
						}
						else if($action == 'detailOriginCate'){
							$countPro = $objPro->countProductCategoryO($client_id, $client_origin);
						}else{
							$countPro = $objPro->countProductCategory($client_id);
						}
					}
				}
				$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
				$limit = 8;
				// tổng số trang
				$total_page = ceil($countPro[0]/ $limit);
				// Giới hạn current_page trong khoảng 1 đến total_page
				if ($current_page > $total_page){
					$current_page = $total_page;
				}
				else if ($current_page < 1){
					$current_page = 1;
				}
				// Tìm Start
				$start = ($current_page - 1) * $limit;
			?>
			
        <div class="row">
            <div class="col-sm-4">
                <div id="categories">
                    <h4 class="lower">Brands</h4>
                        <ul class="underline">
							<li><a href="?action=<?php if($action != 'product'){ echo $action.'&id='.$client_id;}else{ echo $action;} ?>">
								Show all brands (<?php if(isset($all)){ echo $all; }else{ echo $countPro[0];}?>)
							</a></li>
							<?php
								if($action=='product'){
										$showBrand = $objPro->getProductBrand();
										foreach($showBrand as $brand){
										$countBrand = $objPro->countProductBrandById($brand['brand_id'] );
									?>
										<li><a href="?action=product&brand=<?php echo $brand['brand_id'];?>&all=<?php echo $countPro[0];}?>">
											<?php echo $brand['brand_name']." (".$countBrand[0].")"; ?></a>
										</li>
									<?php
								}else{
									if($showCate['parent_id'] == 0){
										$checkCate = $objCate->checkCategoryParentChild($client_id);
										if($checkCate){
											$findCate = $objCate->getParentCategory($client_id);
											foreach($findCate as $cateList){
												$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
												if($checkCate1){
													$findCate1 = $objCate->getParentCategory($cateList['category_id']);
													foreach($findCate1 as $cateList1){
														$showPro = $objPro->$showPro = $objPro->getProductCategoryLimit($cateList1['category_id'], $start, $limit);
															foreach ($showPro as $list){
																$showBrand = $objPro->getProductCategoryBrand($cateList1['category_id']);
																foreach($showBrand as $brand){
																	$countBrand = $objPro->countProductCategoryBrandById($cateList1['category_id'],$brand['brand_id'] );
																	?>
																	<li><a href="?action=detailBrandCate&id=<?php echo $cateList1['category_id'];?>&brand<?php echo $brand['brand_id'];?>&all=<?php echo $countPro[0];?>">
																		<?php echo $brand['brand_name']." (".$countBrand[0].")"; ?>
																	</a></li>
																	<?php
																}
															}
													}
												}else{
														$showBrand = $objPro->getProductCategoryBrand($cateList['category_id']);
													foreach($showBrand as $brand){
														$countBrand = $objPro->countProductCategoryBrandById($cateList['category_id'],$brand['brand_id'] );
													?>
														<li><a href="?action=detailBrandCate&id=<?php echo $cateList['category_id'];?>&brand=<?php echo $brand['brand_id'];?>&all=<?php echo $countPro[0];?>">
															<?php echo $brand['brand_name']." (".$countBrand[0].")"; ?>
														</a></li>
													<?php
													}
												}
											}
										}else{
												$showBrand = $objPro->getProductCategoryBrand($client_id);
											foreach($showBrand as $brand){
												$countBrand = $objPro->countProductCategoryBrandById($client_id,$brand['brand_id']);
											?>
												<li><a href="?action=detailBrandCate&id=<?php echo $client_id;?>&brand=<?php echo $brand['brand_id'];?>&all=<?php echo $countPro[0];?>">
													<?php echo $brand['brand_name']." (".$countBrand[0].")"; ?>
												</a></li>
											<?php
											}
										}
									}else{
											$showBrand = $objPro->getProductCategoryBrand($client_id);
										foreach($showBrand as $brand){
											$countBrand = $objPro->countProductCategoryBrandById($client_id,$brand['brand_id'] );
										?>
											<li><a href="?action=detailBrandCate&id=<?php echo $client_id;?>&brand=<?php echo $brand['brand_id'];?>&all=<?php echo $countPro[0];?>">
												<?php echo $brand['brand_name']." (".$countBrand[0].")"; ?>
											</a></li>
										<?php
										}
									}
								}?>
						</ul>
                    <h4 class="lower">Feature</h4>
                        <ul class="underline">
							<li><a href="?action=<?php if($action != 'product'){ echo $action.'&id='.$client_id;}else{ echo $action;} ?>">
								Show all Features (<?php if(isset($all)){ echo $all; }else{ echo $countPro[0];}?>)
							</a></li>
							<?php
								if($action=='product'){
										$showFeature = $objPro->getProductFeature();
										foreach($showFeature as $feature){
										$countFeature = $objPro->countProductFeatureById($feature['feature_id'] );
									?>
										<li><a href="?action=product&feature=<?php echo $feature['feature_id'];?>&all=<?php echo $countPro[0];?>">
											<?php echo $feature['feature_name']." (".$countFeature[0].")"; ?></a>
										</li>
									<?php
										}
								}else{
									if($showCate['parent_id'] == 0){
										$checkCate = $objCate->checkCategoryParentChild($client_id);
										if($checkCate){
											$findCate = $objCate->getParentCategory($client_id);
											foreach($findCate as $cateList){
												$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
												if($checkCate1){
													$findCate1 = $objCate->getParentCategory($cateList['category_id']);
													foreach($findCate1 as $cateList1){
														$showPro = $objPro->$showPro = $objPro->getProductCategoryLimit($cateList1['category_id'], $start, $limit);
															foreach ($showPro as $list){
																	$showFeature = $objPro->getProductCategoryFeature($cateList['category_id']);
																foreach($showFeature as $feature){
																	$countFeature = $objPro->countProductCategoryFeatureById($cateList1['category_id'],$feature['feature_id'] );
																	?>
																	<li><a href="?action=detailFeatureCate&id=<?php echo $cateList1['category_id'];?>&feature=<?php echo $feature['feature_id'];?>&all=<?php echo $countPro[0];?>">
																		<?php echo $feature['feature_name']." (".$countFeature[0].")"; ?></a>
																	</li>
																	<?php
																}
															}
													}
												}else{
														$showFeature = $objPro->getProductCategoryFeature($cateList['category_id']);
													foreach($showFeature as $feature){
														$countFeature = $objPro->countProductCategoryFeatureById($cateList['category_id'],$feature['feature_id'] );
													?>
														<li><a href="?action=detailFeatureCate&id=<?php echo $cateList['category_id'];?>&feature=<?php echo $feature['feature_id'];?>&all=<?php echo $countPro[0];?>">
															<?php echo $feature['feature_name']." (".$countFeature[0].")"; ?></a>
														</li>
													<?php
													}
												}
											}
										}else{
												$showFeature = $objPro->getProductCategoryFeature($client_id);
											foreach($showFeature as $feature){
												$countFeature = $objPro->countProductCategoryFeatureById($client_id,$feature['feature_id'] );
											?>
												<li><a href="?action=detailFeatureCate&id=<?php echo $client_id;?>&feature=<?php echo $feature['feature_id'];?>&all=<?php echo $countPro[0];?>">
													<?php echo $feature['feature_name']." (".$countFeature[0].")"; ?></a>
												</li>
											<?php
											}
										}
									}else{
											$showFeature = $objPro->getProductCategoryFeature($client_id);
										foreach($showFeature as $feature){
											$countFeature = $objPro->countProductCategoryFeatureById($client_id,$feature['feature_id'] );
										?>
											<li><a href="?action=detailFeatureCate&id=<?php echo $client_id;?>&feature=<?php echo $feature['feature_id'];?>&all=<?php echo $countPro[0];?>">
												<?php echo $feature['feature_name']." (".$countFeature[0].")"; ?></a>
											</li>
										<?php
										}
									}
								}?>
                        </ul>
                        <h4>In Origin</h4>
                        <ul>                          
                            <li><a href="?action=<?php if($action != 'product'){ echo $action.'&id='.$client_id;}else{ echo $action;} ?>">
								Show all In Origin (<?php if(isset($all)){ echo $all; }else{ echo $countPro[0];}?>)
							</a></li>
                            <?php
								if($action=='product'){
										$showOrigin = $objPro->getProductOrigin();
										foreach($showOrigin as $origin){
											$countOrigin = $objPro->countProductOriginById($origin['origin_id'] );
									?>
										<li><a href="?action=product&origin=<?php echo $origin['origin_id'];?>&all=<?php echo $countPro[0];?>">
											<?php echo $origin['name_of_origin']." (".$countOrigin[0].")"; ?></a>
										</li>
									<?php
										}
								}else{
									if($showCate['parent_id'] == 0){
										$checkCate = $objCate->checkCategoryParentChild($client_id);
										if($checkCate){
											$findCate = $objCate->getParentCategory($client_id);
											foreach($findCate as $cateList){
												$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
												if($checkCate1){
													$findCate1 = $objCate->getParentCategory($cateList['category_id']);
													foreach($findCate1 as $cateList1){
															$showOrigin = $objPro->getProductCategoryOrigin($cateList1['category_id']);
														foreach($showOrigin as $origin){
															$countOrigin = $objPro->countProductCategoryOriginById($cateList['category_id'],$origin['origin_id'] );
														?>
															<li><a href="?action=detailOriginCate&id=<?php echo $cateList1['category_id'];?>&origin=<?php echo $origin['origin_id'];?>&all=<?php echo $countPro[0];?>">
																<?php echo $origin['origin_name']." (".$countOrigin[0].")"; ?></a>
															</li>
														<?php
															}
													}
												}else{
														$showOrigin = $objPro->getProductCategoryOrigin($cateList['category_id']);
													foreach($showOrigin as $origin){
														$countOrigin = $objPro->countProductCategoryOriginById($cateList['category_id'],$origin['origin_id'] );
													?>
														<li><a href="?action=detailOriginCate&id=<?php echo $cateList['category_id'];?>&origin=<?php echo $origin['origin_id'];?>&all=<?php echo $countPro[0];?>">
															<?php echo $origin['origin_name']." (".$countOrigin[0].")"; ?></a>
														</li>
													<?php
													}
												}
											}
										}else{
												$showOrigin = $objPro->getProductCategoryOrigin($client_id);
											foreach($showOrigin as $origin){
												$countOrigin = $objPro->countProductCategoryOriginById($client_id,$origin['origin_id'] );
											?>
												<li><a href="?action=detailOriginCate&id=<?php echo $client_id;?>&origin=<?php echo $origin['origin_id'];?>&all=<?php echo $countPro[0];?>">
													<?php echo $origin['name_of_origin']." (".$countOrigin[0].")"; ?></a>
												</li>
											<?php
											}
										}
									}else{
											$showOrigin = $objPro->getProductCategoryOrigin($client_id);
										foreach($showOrigin as $origin){
											$countOrigin = $objPro->countProductCategoryOriginById($client_id,$origin['origin_id'] );
										?>
											<li><a href="?action=detailOriginCate&id=<?php echo $client_id;?>&origin=<?php echo $origin['origin_id'];?>&all=<?php echo $countPro[0];?>">
												<?php echo $origin['name_of_origin']." (".$countOrigin[0].")"; ?></a>
											</li>
										<?php
										}
									}
								}?>
						</ul>
                    </div>
            </div>
            <div class="col-sm-8">
                <div id="right" style="margin-top: 70px">
                    <div id="content">
                        <div id="show-title">
							<span class="left"><span>
								<?php
									$objBrand = new Brands();
									$objFeature = new Features();
									$objOrigin = new Origin();
									
									if($action=='product'){
										echo 'Tất cả sản phẩm';
										if(isset($client_brand)){
											$nameBrand = $objBrand->getBrandById($client_brand);
											echo ' - Thương hiệu: '.$nameBrand['brand_name'];
										}
										if(isset($client_feature)){
											$nameFeature = $objFeature->getFeatureById($client_feature);
											echo ' - Tính năng: '.$nameFeature['feature_name'];
										}
										if(isset($client_origin)){
											$nameOrigin = $objOrigin->getOriginShowById($client_origin);
											echo ' - Nguồn gốc: '.$nameOrigin['name_of_origin'];
										}
									}else{
										echo $showCate['category_name'];
										if(isset($client_brand)){
											$nameBrand = $objBrand->getBrandById($client_brand);
											echo ' - Thương hiệu: '.$nameBrand['brand_name'];
										}
										if(isset($client_feature)){
											$nameFeature = $objFeature->getFeatureById($client_feature);
											echo ' - Tính năng: '.$nameFeature['feature_name'];
										}
										if(isset($client_origin)){
											$nameOrigin = $objOrigin->getOriginShowById($client_origin);
											echo ' - Nguồn gốc: '.$nameOrigin['name_of_origin'];
										}
									}
								?></span></span> 
							<span class="right"><span>Showing </span>
							<?php if($countPro[0]>=8){ echo ($start+1).' - '.($start+$limit)?> <span>of </span><?php echo $countPro[0]; ?></span>
							<?php } else if($countPro[0]==0) {?>  0  
							<?php } else {?>  1 - <?php echo $countPro[0]; ?> <span>of </span><?php echo $countPro[0]; ?></span>  <?php } ?>
						</div>
						<div id="prod-list">
							<div class="prod-row">
								<?php
									if($action=='product'){
										if(isset($client_brand)){
											$sumPro = $objPro->getInStockProductB($client_brand);
										}
										else if(isset($client_feature)){
											$sumPro = $objPro->getInStockProductF($client_feature);
										}
										else if(isset($client_origin)){
											$sumPro = $objPro->getInStockProductO($client_origin);
										}else{
											$sumPro = $objPro->getInStockProduct();
										}
									}else{
										$sumPro[0]=0;
										if($showCate['parent_id'] == 0){
											$checkCate = $objCate->checkCategoryParentChild($client_id);
											if($checkCate){
												$findCate = $objCate->getParentCategory($client_id);
												foreach($findCate as $cateList){
													$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
													if($checkCate1){
														$findCate1 = $objCate->getParentCategory($cateList['category_id']);
														foreach($findCate1 as $cateList1){
															if($action == 'detailBrandCate'){
																$sumPro1 = $objPro->getInStockProductCategoryB($cateList1['category_id'], $client_brand);
																$sumPro[0] += $sumPro1[0];
															}
															else if($action == 'detailFeatureCate'){
																$sumPro1 = $objPro->getInStockProductCategoryF($cateList1['category_id'], $client_feature);
																$sumPro[0] += $sumPro1[0];
															}
															else if($action == 'detailOriginCate'){
																$sumPro1 = $objPro->getInStockProductCategoryO($cateList1['category_id'], $client_origin);
																$sumPro[0] += $sumPro1[0];
															}else{
																$sumPro1 = $objPro->getInStockProductCategory($cateList1['category_id']);
																$sumPro[0] += $sumPro1[0];
															}
														}
													}else{
														if($action == 'detailBrandCate'){
															$sumPro1 = $objPro->getInStockProductCategoryB($cateList['category_id'], $client_brand);
															$sumPro[0] += $sumPro1[0];
														}
														else if($action == 'detailFeatureCate'){
															$sumPro1 = $objPro->getInStockProductCategoryF($cateList['category_id'], $client_feature);
															$sumPro[0] += $sumPro1[0];
														}
														else if($action == 'detailOriginCate'){
															$sumPro1 = $objPro->getInStockProductCategoryO($cateList['category_id'], $client_origin);
															$sumPro[0] += $sumPro1[0];
														}else{
															$sumPro1 = $objPro->getInStockProductCategory($cateList['category_id']);
															$sumPro[0] += $sumPro1[0];
														}
													}
												}
											}else{
												if($action == 'detailBrandCate'){
													$sumPro = $objPro->getInStockProductCategoryB($client_id, $client_brand);
												}
												else if($action == 'detailFeatureCate'){
													$sumPro = $objPro->getInStockProductCategoryF($client_id, $client_feature);
												}
												else if($action == 'detailOriginCate'){
													$sumPro = $objPro->getInStockProductCategoryO($client_id, $client_origin);
												}else{
													$sumPro = $objPro->getInStockProductCategory($client_id);
												}
											}
										}else{
											if($action == 'detailBrandCate'){
												$sumPro = $objPro->getInStockProductCategoryB($client_id, $client_brand);
											}
											else if($action == 'detailFeatureCate'){
												$sumPro = $objPro->getInStockProductCategoryF($client_id, $client_feature);
											}
											else if($action == 'detailOriginCate'){
												$sumPro = $objPro->getInStockProductCategoryO($client_id, $client_origin);
											}else{
												$sumPro = $objPro->getInStockProductCategory($client_id);
											}
										}
									}
									if($sumPro[0] == 0 && $countPro[0]!=0){
										echo 'Loại sản phẩm này đã hết hàng!';
									}
									else if($sumPro[0] == 0 && $countPro[0]==0){
										echo 'Chưa có loại sản phẩm này!';
									} else{
										if($action=='product'){
											if(isset($client_brand)){
												$showPro = $objPro->getProductLimitB($client_brand, $start, $limit);
											}
											else if(isset($client_feature)){
												$showPro = $objPro->getProductLimitF($client_feature, $start, $limit);
											}
											else if(isset($client_origin)){
												$showPro = $objPro->getProductLimitO($client_origin, $start, $limit);
											}else{
												$showPro = $objPro->getProductLimit($start, $limit);
											}
										}else{
											if($showCate['parent_id'] == 0){
												$checkCate = $objCate->checkCategoryParentChild($client_id);
												if($checkCate){
													$findCate = $objCate->getParentCategory($client_id);
													foreach($findCate as $cateList){
														$checkCate1 = $objCate->checkCategoryParentChild($cateList['category_id']);
														if($checkCate1){
															$findCate1 = $objCate->getParentCategory($cateList['category_id']);
															foreach($findCate1 as $cateList1){
																if($action == 'detailBrandCate'){
																	$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitB($cateList1['category_id'], $client_brand, $start, $limit);
																}else if($action == 'detailFeatureCate'){
																	$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitF($cateList1['category_id'], $client_feature, $start, $limit);
																}else if($action == 'detailOriginCate'){
																	$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitO($cateList1['category_id'], $client_origin, $start, $limit);
																}else{
																	$showPro = $objPro->$showPro = $objPro->getProductCategoryLimit($cateList1['category_id'], $start, $limit);
																}
																foreach ($showPro as $list){
																?>
																	<div class="prod" style="margin-bottom: 20px;margin-top: 20px;">
																		<div class="prod-img">
																			<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><img src="<?php echo '../controller/public/client/images/product/'.$list['product_image']; ?>" alt="<?php echo $list['product_name']; ?>" title="<?php echo $list['product_name']; ?>"></a>
																		</div>
																		<div class="prod-text">
																			<h2>
																				<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><?php echo $list['product_name']; ?></a>
																			</h2>
																			<p class="desc"><?php echo $list['product_description']; ?></p>
																			<?php
																			if($list['product_discount']!=0){
																			?>
																				<span class="rrp">Old Price:
																				<?php
																					if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																				?>
																					<span class="rrp-price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																				<?php
																					} else{
																				?>
																					<span class="rrp-price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
																				<?php
																				} }else{}
																				?>
																			<div class="add-box">
																				<a rel="nofollow" href="#" class="add-btn">Add to Cart</a>
																				<?php
																					if($list['product_discount']==0){
																				?>
																				<?php
																					if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																				?>
																					<span class="price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																				<?php
																					} else{
																				?>
																					<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
																				<?php
																					}
																				?>
																				<?php
																					}else {
																					if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																				?>
																					<span class="price"><?php  echo '<span>'.number_format($list['product_discount'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																				<?php
																					} else{
																				?>
																				<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_discount'],2).'</span><span> '.'<span>'; ?>
																				<?php
																					}}
																				?>
																			</div>
																		</div>
																	</div>	
														<?php 
																}
															}
														}else{
															if($action == 'detailBrandCate'){
																$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitB($cateList['category_id'], $client_brand, $start, $limit);
															}else if($action == 'detailFeatureCate'){
																$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitF($cateList['category_id'], $client_feature, $start, $limit);
															}else if($action == 'detailOriginCate'){
																$showPro = $objPro->$showPro = $objPro->getProductCategoryLimitO($cateList['category_id'], $client_origin, $start, $limit);
															}else{
																$showPro = $objPro->$showPro = $objPro->getProductCategoryLimit($cateList['category_id'], $start, $limit);
															}
															foreach ($showPro as $list){
														?>
															<div class="prod" style="margin-bottom: 20px;margin-top: 20px;">
																<div class="prod-img">
																	<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><img src="<?php echo '../controller/public/client/images/product/'.$list['product_image']; ?>" alt="<?php echo $list['product_name']; ?>" title="<?php echo $list['product_name']; ?>"></a>
																</div>
																<div class="prod-text">
																	<h2>
																		<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><?php echo $list['product_name']; ?></a>
																	</h2>
																	<p class="desc"><?php echo $list['product_description']; ?></p>
																	<?php
																		if($list['product_discount']!=0){
																	?>
																	<span class="rrp">Old Price:
																		<?php
																			if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																		?>
																		<span class="rrp-price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																		<?php
																			} else{
																		?>
																		<span class="rrp-price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
																		<?php
																		} }else{}
																		?>
																	<div class="add-box">
																		<a rel="nofollow" href="#" class="add-btn">Add to Cart</a>
																		<?php
																			if($list['product_discount']==0){
																		?>
																		<?php
																			if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																		?>
																		<span class="price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																		<?php
																			} else{
																		?>
																		<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
																		<?php
																			}
																		?>
																		<?php
																			}else {
																			if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
																		?>
																		<span class="price"><?php  echo '<span>'.number_format($list['product_discount'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
																		<?php
																			} else{
																		?>
																		<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_discount'],2).'</span><span> '.'<span>'; ?>
																		<?php
																			}}
																		?>
																	</div>
																</div>
															</div>
														<?php
															}
														}
													}
												}else{
													if($action == 'detailBrandCate'){
														$showPro = $objPro->getProductCategoryLimitB($client_id, $client_brand, $start, $limit);
													}
													else if($action == 'detailFeatureCate'){
														$showPro = $objPro->getProductCategoryLimitF($client_id, $client_feature, $start, $limit);
													}
													else if($action == 'detailOriginCate'){
														$showPro = $objPro->getProductCategoryLimitO($client_id, $client_origin, $start, $limit);
													}else{
														$showPro = $objPro->getProductCategoryLimit($client_id, $start, $limit);
													}
												}
											}else{
												if($action == 'detailBrandCate'){
													$showPro = $objPro->getProductCategoryLimitB($client_id, $client_brand, $start, $limit);
												}
												else if($action == 'detailFeatureCate'){
													$showPro = $objPro->getProductCategoryLimitF($client_id, $client_feature, $start, $limit);
												}
												else if($action == 'detailOriginCate'){
													$showPro = $objPro->getProductCategoryLimitO($client_id, $client_origin, $start, $limit);
												}else{
													$showPro = $objPro->getProductCategoryLimit($client_id, $start, $limit);
												}
											}
										}
										foreach ($showPro as $list){
											?>
											<div class="prod" style="margin-bottom: 20px;margin-top: 20px;">
												<div class="prod-img">
													<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><img src="<?php echo '../controller/public/client/images/product/'.$list['product_image']; ?>" alt="<?php echo $list['product_name']; ?>" title="<?php echo $list['product_name']; ?>"></a>
												</div>
												<div class="prod-text">
													<h2>
														<a href="?action=viewProduct&id=<?php echo $list['product_id']; ?>"><?php echo $list['product_name']; ?></a>
													</h2>
													<p class="desc"><?php echo $list['product_description']; ?></p>
													<?php
														if($list['product_discount']!=0){
													?>
													<span class="rrp">Old Price:
														<?php
															if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
														?>
														<span class="rrp-price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
														<?php
															} else{
														?>
														<span class="rrp-price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
														<?php
														} }else{}
														?>
													<div class="add-box">
														<a rel="nofollow" href="#" class="add-btn">Add to Cart</a>
														<?php
															if($list['product_discount']==0){
														?>
														<?php
															if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
														?>
														<span class="price"><?php  echo '<span>'.number_format($list['product_price'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
														<?php
															} else{
														?>
														<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_price'],2).'</span><span> '.'<span>'; ?>
														<?php
															}
														?>
														<?php
															}else {
															if($list['product_currency']== 'vnđ' || $list['product_currency']== 'đ' || $list['product_currency']== 'vnd' || $list['product_currency']== 'đồng'){
														?>
														<span class="price"><?php  echo '<span>'.number_format($list['product_discount'],2).'</span><span> '.$list['product_currency'].'<span>'; ?>
														<?php
															} else{
														?>
														<span class="price"><?php  echo '<span>'.$list['product_currency'].number_format($list['product_discount'],2).'</span><span> '.'<span>'; ?>
														<?php
															}}
														?>
													</div>
												</div>
											</div>
									<?php
										}
									}
									?>
								<!-- -->
							</div>
						</div>
					</div>                              
				</div>

				<div id="pages"><p>
					<?php
					if($action == 'product'){
						// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
						if ($current_page > 1 && $total_page > 1){
							echo '<a href="?action=product&page='.($current_page-1).'">Prev</a> | ';
						}
						 
						// Lặp khoảng giữa
						for ($i = 1; $i <= $total_page; $i++){
							// Nếu là trang hiện tại thì hiển thị thẻ span
							// ngược lại hiển thị thẻ a
							if ($i == $current_page){
								echo '<span>'.$i.'</span> | ';
							}
							else{
								echo '<a href="?action=product&page='.$i.'">'.$i.'</a> | ';
							}
						}
						 
						// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
						if ($current_page < $total_page && $total_page > 1){
							echo '<a href="?action=product&page='.($current_page+1).'">Next</a>';
						}
					}else{
						// nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
						if ($current_page > 1 && $total_page > 1){
							echo '<a href="?action=category&id='.$client_id.'&page='.($current_page-1).'">Prev</a> | ';
						}
						 
						// Lặp khoảng giữa
						for ($i = 1; $i <= $total_page; $i++){
							// Nếu là trang hiện tại thì hiển thị thẻ span
							// ngược lại hiển thị thẻ a
							if ($i == $current_page){
								echo '<span>'.$i.'</span> | ';
							}
							else{
								echo '<a href="?action=category&id='.$client_id.'&page='.$i.'">'.$i.'</a> | ';
							}
						}
						 
						// nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
						if ($current_page < $total_page && $total_page > 1){
							echo '<a href="?action=category&id='.$client_id.'&page='.($current_page+1).'">Next</a>';
						}
					}
					?>
                </div>
			</div>
        </div>
    </div></div>
</section>
<!-- END PRODUCT -->
<?php include '../views/client/footer.php'; ?>