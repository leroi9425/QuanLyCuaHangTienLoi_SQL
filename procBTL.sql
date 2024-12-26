﻿----------------- Huy ---------------------------
--proc cập nhật thành tiền
create proc updatethanhtien
as begin 
	
	update chitiethoadon set thanhtien=isnull(soluong*(select dongia from mathang where mathang.mamh=chitiethoadon.mamh),0)
end
exec updatethanhtien

--proc cập nhật tổng tiền
alter proc updatetongtien
as begin
	update hoadon set tongtien=isnull((select sum(thanhtien) from chitiethoadon where chitiethoadon.mahd=hoadon.mahd),0)
	declare cur cursor for select makh,tongtien from hoadon
	open cur
	declare @makh char(10),@tongtien int
	fetch next from cur into @makh,@tongtien
	while(@@FETCH_STATUS=0)
	begin
		exec proc_TichDiem @makh,@tongtien
		fetch next from cur into @makh,@tongtien
	end
	close cur
	deallocate cur
end
exec updatetongtien


--proc thêm hóa đơn
create proc inserthoadon @mahd char(10),@makh char(10),@manv char(10),@ngaylap date
as begin
	insert into hoadon(mahd,makh,manv,ngaylap) values(@mahd,@makh,@manv,@ngaylap)
end

--proc cập nhật hóa đơn
create proc updatehoadon @mahd char(10),@makh char(10),@manv char(10),@ngaylap date
as begin
	if exists (select * from hoadon where mahd=@mahd)
		update hoadon set makh=@makh,manv=@manv,ngaylap=@ngaylap where mahd=@mahd
end

--proc xóa hóa đơn sẽ xóa cả chi tiết hóa đơn
create proc deletehoadon @mahd char(10)
as begin
	if exists (select * from hoadon where mahd=@mahd)
	begin
		delete from chitiethoadon where mahd=@mahd
		delete from hoadon where mahd=@mahd
	end
end


--proc thêm chi tiết hóa đơn 
create proc insertcthd @mahd char(10),@mamh char(10),@sl int
as begin
	insert into chitiethoadon(mahd,mamh,soluong) values(@mahd,@mamh,@sl)
end

--proc update cthd
create proc updatecthd @mahd char(10),@mamh char(10),@sl int
as begin
	if exists (select * from chitiethoadon where mahd=@mahd and mamh=@mamh)
		update chitiethoadon set soluong=@sl where mahd=@mahd and mamh=@mamh
end

--------------- HOANG -------------------
-- proc them, sua, xoa loai hang
create proc p_InsertLoaiHang
@malh char(10), @tenlh nvarchar(50)
as begin
	insert into loaihang values (@malh, @tenlh)
end

create proc p_UpdateLoaiHang
@malh char(10), @tenlh nvarchar(50)
as begin
	update loaihang
	set tenlh = @tenlh where malh = @malh
end

create proc p_DeleteLoaiHang
@malh char(10)
as begin
	delete from loaihang where malh = @malh
end

-- proc them, sua, xoa mat hang, xoa mat hang theo so luong
create proc p_InsertMatHang
@mamh char(10), @tenmh nvarchar(50), @malh char(10), @dongia int, @soluong int, @gianhap int
as begin
	if(exists (select * from mathang where mamh = @mamh and tenmh = @tenmh and malh = @malh and dongia = @dongia and gianhap = @gianhap))
		update mathang
		set soluongtrongkho = soluongtrongkho + @soluong
	else
		insert into mathang values (@mamh, @tenmh, @malh, @dongia, @soluong, @gianhap)
end

create proc p_UpdateMatHang
@mamh char(10), @tenmh nvarchar(50), @malh char(10), @dongia int, @soluongtrongkho int, @gianhap int
as begin
	update mathang
	set tenmh = @tenmh, malh = @malh, dongia = @dongia, soluongtrongkho = @soluongtrongkho, gianhap = @gianhap
	where mamh = @mamh
end

create proc p_DeleteMatHang
@mamh char(10)
as begin
	delete from mathang
	where mamh = @mamh
end

create proc p_DeleteSLMatHang
@mamh char(10), @soluong int
as begin
	update mathang
	set soluongtrongkho = soluongtrongkho - @soluong
	where mamh = @mamh
end

--- DUC ANH
--proc thêm khách hàng
create proc insertKhachHang @makh char(10),@hoten char(10),@diachi char(10),@sdt char(10)
as begin
	insert into khachhang(makh,hoten,diachi,sdt) values(@makh,@hoten,@diachi,@sdt)
end

--proc cập nhật khách hàng
create proc updateKhachHang @makh char(10),@hoten char(10),@diachi char(10),@sdt char(10)
as begin
	if exists (select * from khachhang where makh=@makh)
		update khachhang set hoten=@hoten,diachi=@diachi,sdt=@sdt where makh=@makh
end

--proc xóa khách hàng
create proc deleteKhachHang @makh char(10)
as begin
	if exists (select * from khachhang where makh=@makh)
	begin
		delete from khachhang where makh=@makh
	end
end

--proc thêm nhân viên
create proc insertNhanVien @manv char(10),@hoten char(10),@diachi char(10),@ngaysinh date,@gioitinh char(10),@sdt char(10),@luong1gio float,@giolam float
as begin
	insert into nhanvien(manv,hoten,diachi,ngaysinh,gioitinh,sdt,luong1gio,giolam) values(@manv,@hoten,@diachi,@ngaysinh,@gioitinh,@sdt,@luong1gio,@giolam)
end

--proc cập nhật nhân viên
create proc updateNhanVien @manv char(10),@hoten char(10),@diachi char(10),@ngaysinh date,@gioitinh char(10),@sdt char(10),@luong1gio float,@giolam float
as begin
	if exists (select * from nhanvien where manv=@manv)
		update nhanvien set hoten=@hoten,diachi=@diachi,ngaysinh=@ngaysinh,gioitinh=@gioitinh,sdt=@sdt,luong1gio=@luong1gio,giolam=@giolam where manv=@manv
end

--proc xóa nhân viên
create proc deleteNhanVien @manv char(10)
as begin
	if exists (select * from nhanvien where manv=@manv)
	begin
		delete from nhanvien where manv=@manv
	end
end

--proc cập nhật lương
alter proc updateLuong
as begin 
	
	update nhanvien set luong = isnull(luong1gio * giolam,0)
end

exec updateLuong

-- proc tích điểm với tham số truyền vào là mã khách hàng với tổng tiền
alter proc proc_TichDiem 
@makh char(10),
@tien money 
as begin 
	declare @count int 
	if (dbo.func_KTraTheTichDiem (@maKH) = 0 )
		print N'Khách hàng chưa có thẻ tích điểm' 
	else 
		update thetichdiem 
		set diemtichluy = diemtichluy + dbo.fnc_TinhDiem(@tien) 
		where makh = @makh
end

exec proc_TichDiem 'KH1',400000
select * from thetichdiem

--proc quy đổi điểm và sử dụng điểm tích lũy để trừ vào tổng tiền
alter proc proc_QuyDoiDiem
@mahd char(10) 
as begin 
	declare @idThe int
	select @idThe = mathe
	from hoadon,thetichdiem 
	where hoadon.makh = thetichdiem.makh and hoadon.mahd= @mahd 

	if((select diemtichluy from thetichdiem where mathe=@idThe)*1000 <= (select tongtien from hoadon where mahd = @mahd))
	begin
		update hoadon
		set tongtien  = (
			select SUM(thanhtien) 
			from chitiethoadon
			where chitiethoadon.mahd = @mahd
			) - dbo.fnc_QuyDoiDiem (@idThe)
		where hoadon.mahd=@mahd 

		update thetichdiem 
		set diemtichluy = 0
		where mathe=@idThe 
	end
	else if((select diemtichluy from thetichdiem where mathe=@idThe)*1000 > (select tongtien from hoadon where mahd = @mahd))
	begin
		update thetichdiem 
		set diemtichluy = (diemtichluy - (select tongtien from hoadon where mahd = @mahd)/1000)
		where mathe=@idThe 

		update hoadon
		set tongtien  = 0
		where mahd=@mahd
	end
end