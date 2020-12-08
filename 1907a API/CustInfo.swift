struct CustomerInfo: Codable {
    let acctId: String
    let id: String
    let fName: String
    let lName: String
    let permissions: String
    let email: String
    let sms: String
    let carrier: String
    let password: String
    
    enum CodingKeys: String, CodingKey {
        case acctId = "acctid"
        case id = "id"
        case fName = "fname"
        case lName = "lname"
        case permissions = "permissions"
        case email = "email"
        case sms = "sms"
        case carrier = "carrier"
        case password = "password"
    }
}
