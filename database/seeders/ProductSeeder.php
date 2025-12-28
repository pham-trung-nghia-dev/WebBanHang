<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Xóa dữ liệu cũ (nếu có)
        DB::table('tbl_product')->delete();
        DB::table('tbl_category_product')->delete();
        DB::table('tbl_brand')->delete();

        // Thêm danh mục cha
        $parentCategories = [
            [
                'category_name' => 'Thời trang nam',
                'category_desc' => 'Quần áo, phụ kiện thời trang dành cho nam giới',
                'parent_id' => 0,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Thời trang nữ',
                'category_desc' => 'Quần áo, phụ kiện thời trang dành cho nữ giới',
                'parent_id' => 0,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Giày dép',
                'category_desc' => 'Giày dép nam, nữ các loại',
                'parent_id' => 0,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tbl_category_product')->insert($parentCategories);

        // Lấy ID của các danh mục cha vừa tạo
        $parentIds = DB::table('tbl_category_product')->where('parent_id', 0)->pluck('category_id')->toArray();
        $thoiTrangNamId = $parentIds[0];
        $thoiTrangNuId = $parentIds[1];
        $giayDepId = $parentIds[2];

        // Thêm danh mục con
        $subCategories = [
            // Danh mục con của Thời trang nam
            [
                'category_name' => 'Áo thun nam',
                'category_desc' => 'Áo thun nam các loại',
                'parent_id' => $thoiTrangNamId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Áo sơ mi nam',
                'category_desc' => 'Áo sơ mi nam công sở',
                'parent_id' => $thoiTrangNamId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Quần nam',
                'category_desc' => 'Quần jeans, quần dài nam',
                'parent_id' => $thoiTrangNamId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Áo khoác nam',
                'category_desc' => 'Áo khoác, áo jacket nam',
                'parent_id' => $thoiTrangNamId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Danh mục con của Thời trang nữ
            [
                'category_name' => 'Áo thun nữ',
                'category_desc' => 'Áo thun nữ các loại',
                'parent_id' => $thoiTrangNuId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Váy',
                'category_desc' => 'Váy liền, váy xòe nữ',
                'parent_id' => $thoiTrangNuId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Quần nữ',
                'category_desc' => 'Quần jeans, quần legging nữ',
                'parent_id' => $thoiTrangNuId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Áo khoác nữ',
                'category_desc' => 'Áo khoác, áo cardigan nữ',
                'parent_id' => $thoiTrangNuId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Danh mục con của Giày dép
            [
                'category_name' => 'Giày thể thao',
                'category_desc' => 'Giày thể thao nam, nữ',
                'parent_id' => $giayDepId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Giày cao gót',
                'category_desc' => 'Giày cao gót nữ',
                'parent_id' => $giayDepId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Dép, sandal',
                'category_desc' => 'Dép quai hậu, sandal',
                'parent_id' => $giayDepId,
                'category_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tbl_category_product')->insert($subCategories);

        // Thêm thương hiệu
        $brands = [
            [
                'brand_name' => 'Nike',
                'brand_desc' => 'Thương hiệu thể thao nổi tiếng',
                'brand_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Adidas',
                'brand_desc' => 'Thương hiệu thể thao hàng đầu',
                'brand_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Uniqlo',
                'brand_desc' => 'Thời trang basic chất lượng cao',
                'brand_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'Zara',
                'brand_desc' => 'Thời trang nhanh châu Âu',
                'brand_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'brand_name' => 'No Brand',
                'brand_desc' => 'Sản phẩm không thương hiệu',
                'brand_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('tbl_brand')->insert($brands);

        // Lấy danh sách hình ảnh từ thư mục upload
        $imageFiles = [
            '08b20ee4eb6e5936a2c09afae6fd95cf7793.webp',
            '402536.webp',
            '61FTlZor2sL8790.jpg',
            '61FTlZor2sL87906116.jpg',
            '6783.jpg',
            '69e6abb32bafd1cb5fa133fffc0edfb67783.webp',
            '79a517f8a01858e1764b3db385fa24af5110.jpg',
            '953037251-1_6867fd389659456ba0737121a59aca749731.jpg',
            'Cgr-19768.jpg',
            'Cgr-21296.jpg',
            'Cgr-31640.jpg',
            'Cgr-33969.jpg',
            'e26968c6feafa0245b93b754b8944a9c-16668629125817917.jpg',
            'ef53780-Photoroom-14486.jpg',
            'eXZHledLbbG8cULQjzv1q6z224Z3DNwjrlcJHHht4745.webp',
            'f444698b6fe1a593c55237a5343c196a412.webp',
            'goods_65_473906_3x43610.avif',
            'headband-on-off-black-white-14759.png',
            'images6231.jpg',
            'KA3900HD_32679.jpg',
            'MilanWoolCoat2636.webp',
            'o1cn01dxe4bt28vcukhhc6g16111175830.webp',
            'o1cn01mafg4g2gdswnmtyzd39072596208.jpg',
            's-l16008392.webp',
            's-l8009263.jpg',
            'thu11113552.png',
            'TS246J2427.jpg',
            'tx_03565_96bffa68e35f439f9f70cdaf5b701417_master_96abf664583348fb89ea86f0fe5a71f5_large6428.jpg',
            'U2652601-13109.jpg',
            'vn-11134207-7r98o-ln36l8g517fca82228.jpg',
            'vn-11134207-7ras8-mbg5siu4a1dzbe3373.jpg',
        ];

        // Tên sản phẩm mẫu
        $productNames = [
            'Áo thun nam cổ tròn',
            'Quần jean nam dài',
            'Áo khoác gió nam',
            'Quần short nam',
            'Áo sơ mi nam dài tay',
            'Quần tây nam công sở',
            'Áo thun nữ cổ tròn',
            'Quần jean nữ ống đứng',
            'Áo khoác nữ',
            'Váy liền thân nữ',
            'Áo sơ mi nữ',
            'Quần short nữ',
            'Giày thể thao nam',
            'Giày thể thao nữ',
            'Giày cao gót nữ',
            'Dép quai hậu',
            'Áo khoác dù nam',
            'Áo khoác da nữ',
            'Quần jogger nam',
            'Quần legging nữ',
            'Áo len nam',
            'Áo len nữ',
            'Áo hoodie nam',
            'Áo hoodie nữ',
            'Áo khoác bomber nam',
            'Quần jean nữ rách gối',
            'Áo thun có cổ',
            'Quần jean ống rộng',
            'Áo khoác lông vũ',
            'Quần tây nữ',
            'Áo cardigan nữ',
            'Áo blazer nữ',
        ];

        // Thêm sản phẩm
        $products = [];
        // Chỉ lấy danh mục con (parent_id != 0) để gán cho sản phẩm
        $categoryIds = DB::table('tbl_category_product')->where('parent_id', '!=', 0)->pluck('category_id')->toArray();
        $brandIds = DB::table('tbl_brand')->pluck('brand_id')->toArray();

        for ($i = 0; $i < count($imageFiles) && $i < count($productNames); $i++) {
            $products[] = [
                'product_name' => $productNames[$i],
                'category_id' => $categoryIds[array_rand($categoryIds)],
                'brand_id' => $brandIds[array_rand($brandIds)],
                'product_desc' => 'Mô tả sản phẩm ' . $productNames[$i] . ' - Chất lượng cao, giá cả hợp lý',
                'product_content' => 'Chi tiết sản phẩm: ' . $productNames[$i] . '
- Chất liệu: 100% cotton/ Polyester/ Vải cao cấp
- Màu sắc: Đa dạng
- Kích thước: S, M, L, XL, XXL
- Phù hợp với mọi lứa tuổi
- Thiết kế hiện đại, trẻ trung
- Giá cả hợp lý, chất lượng đảm bảo',
                'product_price' => (string)rand(100000, 5000000),
                'product_image' => $imageFiles[$i],
                'product_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('tbl_product')->insert($products);

        $totalCategories = DB::table('tbl_category_product')->count();
        $totalBrands = DB::table('tbl_brand')->count();
        $totalProducts = count($products);

        $this->command->info("Đã thêm $totalCategories danh mục (bao gồm danh mục con), $totalBrands thương hiệu và $totalProducts sản phẩm!");
    }
}
