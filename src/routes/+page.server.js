import { readFileSync } from 'fs';
import path from 'path';

export const load = async () => {
    const servicesPath = path.resolve('src/lib/data/services.json');
    const services = JSON.parse(readFileSync(servicesPath, 'utf8'));

    return {
        services: services.services
    };
};
