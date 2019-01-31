export default class Invoice {
    constructor(profile = {}, id = 0, serial = '', payment_id = 0, currency_id = 0, title = '', desc = '', client_acc = 0, NType = 1, NDate = '', ext_num = '', int_num = '', sum = 0, remaining = 0, client_id = 0, warehouse_id = 0, records = []) {
        this.id = id;
        this.serial = serial;
        this.payment_id = payment_id;
        this.currency_id = currency_id;
        this.title = title;
        this.desc = desc;
        this.client_acc = client_acc;
        this.NType = NType;
        this.NDate = NDate;
        this.ext_num = ext_num;
        this.int_num = int_num;
        this.sum = sum;
        this.remaining = remaining;
        this.client_id = client_id;
        this.warehouse_id = warehouse_id;
        this.profile_id = profile.id;
        this.base_id = profile._base.id;
        this.records = records;
    }
    fill(obj) {
        this.id = obj.id; this.serial = obj.serial; this.payment_id = obj.payment_id; this.currency_id = obj.currency_id; this.title = obj.title; this.desc = obj.desc;
        this.client_acc = obj.client_acc; this.NType = obj.NType; this.NDate = obj.NDate; this.ext_num = obj.ext_num; this.int_num = obj.int_num; this.sum = obj.sum;
        this.remaining = obj.remaining; this.client_id = obj.client_id; this.warehouse_id = obj.warehouse_id;
    }
}