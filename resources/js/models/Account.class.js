export default class Account {
    constructor(code="", title={ar: '', en: '', tr: ''}, desc="", serial=0, NType=0, parentAcc=0, closeAcc=0, KType=0, EType=0, EVal=0, ECurrency=0, EBuy=0, EisPart=false, 
                hideInSearch=false, CCisReq=false, CCTitle="", TOFL_income=0, TOFL_ownership=0, TOFL_finCenter=0, TOFL_cashFlow=0, TOFL_clasDet=0) {
        this.code = code; 
        this.title = title; // {ar: '', en: '', tr: ''}
        this.desc = desc; 
        this.serial = serial; 
        this.NType = NType; 

        this.parentAcc = parentAcc; 
        this.closeAcc = closeAcc; 
        this.KType = KType; 

        this.EType = EType; // Evaluation Budgeting
        this.EVal = EVal; 
        this.ECurrency = ECurrency; 
        this.EBuy = EBuy; 
        this.EisPart = EisPart; 
 
        this.hideInSearch = hideInSearch; 
        this.CCisReq = CCisReq; // Cost Center
        this.CCTitle = CCTitle; 

        this.TOFL_income = TOFL_income; // Tabs Of Financial Lists
        this.TOFL_ownership = TOFL_ownership;
        this.TOFL_finCenter = TOFL_finCenter; // Financial Center
        this.TOFL_cashFlow = TOFL_cashFlow;
        this.TOFL_clasDet = TOFL_clasDet; // classifications details
    }

    fill(obj) { console.log('fill', obj);
        this.code = obj.code; this.title.ar = obj.title; this.desc = obj.desc;  this.serial = obj.serial;  this.NType = obj.NType; 
        this.parentAcc = obj.parentAcc;  this.closeAcc = obj.closeAcc;  this.KType = obj.KType; 
        this.EType = obj.EType; this.EVal = obj.EVal;  this.ECurrency = obj.ECurrency;  this.EBuy = obj.EBuy;  this.EisPart = obj.EisPart; 
        this.hideInSearch = obj.hideInSearch;  this.CCisReq = obj.CCisReq;  this.CCTitle = obj.CCTitle; 
        this.TOFL_income = obj.TOFL_income; this.TOFL_ownership = obj.TOFL_ownership; this.TOFL_finCenter = obj.TOFL_finCenter; this.TOFL_cashFlow = obj.TOFL_cashFlow; this.TOFL_clasDet = obj.TOFL_clasDet; 
    }
}