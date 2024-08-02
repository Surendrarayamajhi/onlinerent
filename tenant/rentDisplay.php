<?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <?php
                        $postId = $row['p_id'];
                        $title = $row['p_title'];
                        $category_no = $row['p_category'];
                        $address = $row['p_address'];
                        $price = $row['p_price'];

                        // Fetch the image for the post
                        $query = "SELECT * FROM post_images WHERE post_id = $postId LIMIT 1";
                        $imageResult = runQuery($query);
                        $imageRow = mysqli_fetch_assoc($imageResult);
                        $image = null;
                        if ($imageRow) {
                            $image = $imageRow['post_images'];
                        }
                        ?>

                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 col-12">
                            <div class="card product-card"> <!-- Added 'product-card' class -->
                                <div class="product-image-container">
                                    <img src="../images/<?php echo $image; ?>" class="card-img-top css-card-img product-image" alt="..."> <!-- Added 'product-image' class -->
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo ' ' . $title; ?></h5>
                                    <div class="d-flex justify-content-between align-items-center gap-3">
                                        <p class="card-text m-0 one-line"><i class="fa-solid fa-location-dot"></i><?php echo ' ' . $address; ?></p>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <p class="p-0 m-0"><i class="fa-solid fa-building"></i><?php echo ' ' . getCategory($category_no); ?></p>
                                        <p class="p-0 m-0"><i class="fa-solid fa-money-bill"></i> <?php echo ' ' . $price; ?></p>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                                        <a href="View.php?id=<?php echo $postId; ?>" class="btn btn-outline-primary btn-sm w-100">View</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php endwhile; 

                    if (mysqli_num_rows($result) == 0) {
                        echo '<div class="alert alert-info" role="alert">No posts found.</div>';
                    }
                    ?>