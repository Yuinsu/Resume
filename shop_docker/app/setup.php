<?php
require_once 'db.php';

try {
    // 상품 테이블 생성
    $pdo->exec("CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        price INT NOT NULL,
        description TEXT,
        image_url VARCHAR(255)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    // 주문 테이블 생성
    $pdo->exec("CREATE TABLE IF NOT EXISTS orders (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_name VARCHAR(50) NOT NULL,
        product_name VARCHAR(100) NOT NULL,
        quantity INT NOT NULL,
        order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4");

    // 상품 데이터가 비어있으면 초기 데이터 넣기
    $stmt = $pdo->query("SELECT COUNT(*) FROM products");
    if ($stmt->fetchColumn() == 0) {
        $pdo->exec("INSERT INTO products (name, price, description, image_url) VALUES
        ('Quantum Headset', 89000, '최고의 노이즈 캔슬링 기능을 제공하는 무선 헤드셋입니다.', 'https://placehold.co/300x200/1a1a1a/FFF?text=Headset'),
        ('Neon Keyboard', 125000, '화려한 RGB 백라이트가 돋보이는 기계식 키보드입니다.', 'https://placehold.co/300x200/1a1a1a/FFF?text=Keyboard'),
        ('Cyber Mouse', 55000, '초정밀 센서를 탑재한 게이밍 마우스입니다.', 'https://placehold.co/300x200/1a1a1a/FFF?text=Mouse'),
        ('Ultra Monitor', 450000, '144Hz 주사율을 지원하는 4K 게이밍 모니터입니다.', 'https://placehold.co/300x200/1a1a1a/FFF?text=Monitor')");
        echo "✅ 초기 상품 데이터가 입력되었습니다.<br>";
    }

    echo "🎉 테이블 생성 완료! 이제 홈페이지로 이동하세요. <a href='index.php'>홈으로 가기</a>";

} catch (PDOException $e) {
    echo "오류 발생: " . $e->getMessage();
}
?>
```

---

### 2. GitHub에 코드 올리기

배포하려면 코드가 GitHub에 있어야 합니다.

1.  **`.gitignore` 파일 만들기:**
    `shop_docker` 폴더(최상위)에 `.gitignore` 파일을 만들고 아래 내용을 넣습니다. (보안상 `.env` 파일은 절대 올리면 안 됩니다!)
    ```text
    .env
    db_data/
    .DS_Store
    ```
2.  **GitHub 저장소 생성:**
    * GitHub에 로그인 후 **New Repository**를 누릅니다.
    * 이름을 `galaxy-shop` 등으로 짓고 **Create repository**를 클릭합니다.
3.  **코드 업로드 (터미널):**
    VS Code 터미널에서 `shop_docker` 폴더로 이동 후 아래 명령어를 한 줄씩 입력하세요.
    ```bash
    git init
    git add .
    git commit -m "쇼핑몰 배포용 코드"
    git branch -M main
    # 아래 주소는 본인이 만든 GitHub 주소로 바꾸세요!
    git remote add origin https://github.com/본인아이디/galaxy-shop.git
    git push -u origin main
