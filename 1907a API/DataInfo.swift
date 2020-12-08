struct DataInfo: Codable {
    let dataId: String
    let readingTime: String
    let sensorId: String
    let reading: String
    
    enum CodingKeys: String, CodingKey {
        case dataId = "dataid"
        case readingTime = "datetime"
        case sensorId = "sensorid"
        case reading = "reading"
    }
}