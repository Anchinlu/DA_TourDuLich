<?php
$total = null;
$error = null;
$books = [
    ['name' => 'Nhà Giả Kim - Paulo Coelho', 'price' => 89000],
    ['name' => 'Đắc Nhân Tâm - Dale Carnegie', 'price' => 95000],
    ['name' => 'Tuổi Trẻ Đáng Giá Bao Nhiêu - Rosie Nguyễn', 'price' => 78000],
    ['name' => 'Tôi Tài Giỏi Bạn Cũng Thế - Adam Khoo', 'price' => 120000],
    ['name' => 'Sapiens - Yuval Noah Harari', 'price' => 145000]
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $total = 0;
    $quantities = [];
    
    foreach ($books as $index => $book) {
        $qty = isset($_POST["qty_$index"]) ? (int)$_POST["qty_$index"] : 0;
        if ($qty < 0) {
            $error = "Số lượng phải không âm.";
            $total = null;
            break;
        }
        $quantities[$index] = $qty;
        $total += $qty * $book['price'];
    }
}
?>
<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tính tổng tiền sách</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600&display=swap" rel="stylesheet">
<style>
:root {
	--bg: #0f172a;
	--card: #111827;
	--muted: #94a3b8;
	--text: #e5e7eb;
	--primary: #22c55e;
	--primary-600: #16a34a;
	--danger: #ef4444;
	--ring: 0 0 0 3px rgba(34,197,94,.25);
}
* { box-sizing: border-box; }
body {
	margin: 0;
	min-height: 100vh;
	display: grid;
	place-items: center;
	background: radial-gradient(1200px 600px at 80% -100px, #1f2937 10%, transparent 60%) no-repeat, var(--bg);
	font-family: Inter, system-ui, -apple-system, Segoe UI, Roboto, Arial, sans-serif;
	color: var(--text);
}
.container {
	width: 100%;
	max-width: 520px;
	padding: 24px;
}
.card {
	background: linear-gradient(180deg, rgba(255,255,255,.04), rgba(255,255,255,.02));
	border: 1px solid rgba(255,255,255,.08);
	border-radius: 16px;
	box-shadow: 0 10px 30px rgba(0,0,0,.35);
	backdrop-filter: blur(6px);
}
.card-header {
	padding: 20px 20px 0 20px;
}
.title {
	margin: 0;
	font-size: 20px;
	font-weight: 600;
	letter-spacing: .2px;
}
.subtitle {
	margin: 6px 0 0;
	color: var(--muted);
	font-size: 13px;
}
.card-body {
	padding: 20px;
	display: grid;
	gap: 14px;
}
.field {
	display: grid;
	gap: 6px;
}
label {
	font-size: 13px;
	color: var(--muted);
}
.input {
	display: flex;
	align-items: center;
	gap: 8px;
	background: var(--card);
	border: 1px solid rgba(255,255,255,.08);
	color: var(--text);
	padding: 12px 14px;
	border-radius: 10px;
	outline: none;
	transition: .15s border, .15s box-shadow, .15s transform;
}
.input:focus {
	border-color: rgba(34,197,94,.6);
	box-shadow: var(--ring);
}
.input::-webkit-outer-spin-button,
.input::-webkit-inner-spin-button { -webkit-appearance: none; margin: 0; }
.row {
	display: grid;
	grid-template-columns: 1fr 1fr;
	gap: 14px;
}
.btn {
	appearance: none;
	border: 0;
	padding: 12px 16px;
	border-radius: 10px;
	background: linear-gradient(180deg, var(--primary), var(--primary-600));
	color: white;
	font-weight: 600;
	cursor: pointer;
	transition: transform .06s ease, filter .15s ease;
}
.btn:active { transform: translateY(1px); }
.helper {
	font-size: 12px;
	color: var(--muted);
	margin-top: -4px;
}
.alert {
	margin: 6px 20px 0;
	color: #fecaca;
	background: rgba(239, 68, 68, .08);
	border: 1px solid rgba(239, 68, 68, .25);
	padding: 10px 12px;
	border-radius: 10px;
	font-size: 13px;
}
.result {
	margin: 8px 20px 20px;
	background: linear-gradient(180deg, rgba(34,197,94,.12), rgba(34,197,94,.06));
	border: 1px solid rgba(34,197,94,.35);
	border-radius: 12px;
	padding: 14px 16px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.amount {
	font-size: 20px;
	font-weight: 700;
}
.badge {
	font-size: 12px;
	color: var(--muted);
	border: 1px dashed rgba(255,255,255,.18);
	padding: 4px 8px;
	border-radius: 999px;
}
.footer {
	padding: 0 20px 18px;
	display: flex;
	justify-content: space-between;
	align-items: center;
}
.note {
	color: var(--muted);
	font-size: 12px;
}
.book-item {
	display: flex;
	justify-content: space-between;
	align-items: center;
	padding: 16px;
	margin-bottom: 12px;
	background: rgba(255,255,255,.02);
	border: 1px solid rgba(255,255,255,.05);
	border-radius: 12px;
	transition: all 0.3s ease;
}
.book-item:hover {
	background: rgba(255,255,255,.04);
	border-color: rgba(34,197,94,.2);
}
.book-info {
	flex: 1;
	margin-right: 16px;
}
.book-title {
	font-size: 14px;
	font-weight: 600;
	color: var(--text);
	margin-bottom: 4px;
}
.book-price {
	font-size: 12px;
	color: var(--primary);
	font-weight: 500;
}

@media (max-width: 520px) {
	.container { padding: 18px; }
	.row { grid-template-columns: 1fr; }
	.book-item {
		flex-direction: column;
		text-align: center;
		gap: 12px;
	}
	.book-info {
		margin-right: 0;
	}
}
</style>
</head>
<body>
<div class="container">
	<div class="card">
		<div class="card-header">
			<h1 class="title">📚 Tính tổng tiền mua sách</h1>
			<p class="subtitle">Chọn số lượng cho mỗi cuốn sách</p>
		</div>

		<form class="card-body" method="post" onsubmit="return validateForm()">
			<?php foreach ($books as $index => $book): ?>
			<div class="book-item">
				<div class="book-info">
					<div class="book-title"><?= htmlspecialchars($book['name']) ?></div>
					<div class="book-price">Giá: <?= number_format($book['price'], 0, ',', '.') ?> VNĐ</div>
				</div>
				<div class="field">
					<label for="qty_<?= $index ?>">Số lượng:</label>
					<input id="qty_<?= $index ?>" name="qty_<?= $index ?>" class="input" type="number" min="0" step="1" value="<?= isset($quantities[$index]) ? $quantities[$index] : 0 ?>" onchange="calculateTotal()">
				</div>
			</div>
			<?php endforeach; ?>
			<button type="submit" class="btn">💰 Tính tổng</button>
		</form>

		<?php if ($error): ?>
			<div class="alert"><?= htmlspecialchars($error) ?></div>
		<?php endif; ?>

		<?php if (!is_null($total) && !$error): ?>
			<div class="result">
				<span class="badge">Tổng tiền</span>
				<span class="amount"><?= number_format($total, 0, ',', '.') ?> VND</span>
			</div>
		<?php endif; ?>

		<div class="footer">
			<span class="note">Tự động lưu giá trị đã nhập sau khi tính.</span>
			<span class="badge">PHP + Vanilla CSS</span>
		</div>
	</div>
</div>

<script>
function calculateTotal() {
	let total = 0;
	const inputs = document.querySelectorAll('input[type="number"]');
	
	inputs.forEach(input => {
		const quantity = parseInt(input.value) || 0;
		const price = getPriceFromBook(input);
		total += quantity * price;
	});
	
	// Hiển thị tổng tiền tạm thời (nếu có element để hiển thị)
	const totalDisplay = document.getElementById('totalDisplay');
	if (totalDisplay) {
		totalDisplay.textContent = formatNumber(total);
	}
}

function getPriceFromBook(input) {
	// Lấy giá từ text hiển thị giá sách
	const bookItem = input.closest('.book-item');
	const priceText = bookItem.querySelector('.book-price').textContent;
	const priceMatch = priceText.match(/[\d,]+/);
	if (priceMatch) {
		return parseInt(priceMatch[0].replace(/,/g, ''));
	}
	return 0;
}

function formatNumber(num) {
	return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function validateForm() {
	const inputs = document.querySelectorAll('input[type="number"]');
	for (let input of inputs) {
		if (Number(input.value) < 0) {
			alert('Số lượng phải không âm.');
			return false;
		}
	}
	return true;
}

// Tính tổng khi trang được tải
document.addEventListener('DOMContentLoaded', function() {
	calculateTotal();
});
</script>
</body>
</html>