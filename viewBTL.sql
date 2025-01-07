--- Hoang
-- view hiển thị các mặt hàng và khách hàng mua nó
create view v_khachHangTieuDung
as select
	khachhang.makh, khachhang.hoten, mathang.mamh, mathang.tenmh, tenlh, 
	dbo.f_SanPhamHayMua(khachhang.makh, mathang.mamh) as 'So luong'
	
	from mathang, chitiethoadon, khachhang, hoadon, loaihang

	where khachhang.makh = hoadon.makh and hoadon.mahd = chitiethoadon.mahd
	and chitiethoadon.mamh = mathang.mamh and mathang.malh = loaihang.malh

select * from v_khachHangTieuDung


-- view hiển thị só lượng đã bán của từng mặt hàng va so tien thu duoc khi ban mat hang do
create view v_ThongKeMatHang
as 
	select mathang.mamh, mathang.tenmh, tenlh, dongia, sum(chitiethoadon.soluong) as 'So luong',
		   dbo.f_ThanhTienMh(mathang.mamh) as 'Doanh thu'
	from hoadon, chitiethoadon, mathang, loaihang
	where hoadon.mahd = chitiethoadon.mahd and chitiethoadon.mamh = mathang.mamh
	and mathang.malh = loaihang.malh
	group by mathang.mamh, mathang.tenmh, tenlh, dongia