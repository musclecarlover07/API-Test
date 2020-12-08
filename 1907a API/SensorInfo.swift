struct SensorInfo: Codable {
    let sensorId: String
    let type: String
    let hi: String
    let lo: String
    let location: String
    
    enum CodingKeys: String, CodingKey {
        case sensorId = "sensorid"
        case type = "type"
        case hi = "hi"
        case lo = "lo"
        case location = "location"
    }
}