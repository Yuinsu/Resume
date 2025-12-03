-- 상품 테이블
CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    price INT NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 주문 테이블
CREATE TABLE IF NOT EXISTS orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(50) NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    quantity INT NOT NULL,
    order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 초기 상품 데이터 입력 (이미지는 플레이스홀더 사용)
INSERT INTO products (name, price, description, image_url) VALUES
('Quantum Headset', 89000, '최고의 노이즈 캔슬링 기능을 제공하는 무선 헤드셋입니다.', '[https://placehold.co/300x200/1a1a1a/FFF?text=Headset](https://placehold.co/300x200/1a1a1a/FFF?text=Headset)'),
('Neon Keyboard', 125000, '화려한 RGB 백라이트가 돋보이는 기계식 키보드입니다.', '[https://placehold.co/300x200/1a1a1a/FFF?text=Keyboard](https://placehold.co/300x200/1a1a1a/FFF?text=Keyboard)'),
('Cyber Mouse', 55000, '초정밀 센서를 탑재한 게이밍 마우스입니다.', '[https://placehold.co/300x200/1a1a1a/FFF?text=Mouse](https://placehold.co/300x200/1a1a1a/FFF?text=Mouse)'),
('Ultra Monitor', 450000, '144Hz 주사율을 지원하는 4K 게이밍 모니터입니다.', '[https://placehold.co/300x200/1a1a1a/FFF?text=Monitor](https://placehold.co/300x200/1a1a1a/FFF?text=Monitor)');

